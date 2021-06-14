<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Admin|Inhaber|create categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('admin.kategorie.index', compact('category', $category));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->title;
        $name = strtolower(str_replace($search, $replace, $title));
        $slug = $name;
        $published_at = Carbon::parse(now())->toDateTimeLocalString();
        $description = $request->description;
        if (isset($request->published)) { $published = true; } else { $published = false; }

        $images = $request->file('images');
        if (isset($images)) {
            $imagess = $slug.'-'.$images->getClientOriginalExtension();
            $image = str_replace($search, $replace, $imagess);

            /*if (Storage::disk('public')->exists('images/kategorie/'.$image)) {
                Storage::disk('public')->makeDirectory('images/kategorie/'.$image);
            }*/
            $KategorieImage = Image::make($images)->encode('webp', 90)->resize(1400, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $KategorieImage->save(public_path('images/kategorie/'.$image . '.webp'));
//            Storage::disk('public')->put('images/kategorie/'.$image, $KategorieImage);
        }

        $category = new Category();
        $category->sort = $request->sort;
        $category->title = $request->title;
        $category->name = $name;
        $category->slug = $slug;
        $category->images = $image.'.webp';
        $category->description = $description;
        $category->published = true;
        $category->kategorie = $title;
        $category->published_at = $published_at;
        $category->save();

        Toastr::success('Kategorie erfolgreich angelegt!', 'ERFOLGREICH');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.kategorie.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->title;
        $name = strtolower(str_replace($search, $replace, $title));
        $slug = $name;
        $published_at = Carbon::parse(now())->toDateTimeLocalString();
        $description = $request->description;
        if (isset($request->published)) { $published = true; } else { $published = false; }

        $images = $request->file('images');
        if (isset($images)) {
            $imagess = $slug.'-'.$images->getClientOriginalExtension();
            $image = str_replace($search, $replace, $imagess);

            /*if (Storage::disk('public')->exists('images/kategorie/'.$image)) {
                Storage::disk('public')->makeDirectory('images/kategorie/'.$image);
            }*/
            $KategorieImage = Image::make($images)->encode('webp', 90)->resize(1400, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $KategorieImage->save(public_path('images/kategorie/'.$image . '.webp'));
//            Storage::disk('public')->put('images/kategorie/'.$image, $KategorieImage);
            $save = $image.'.webp';
        } else {
            $save = $request->imagesalt;
        }

        $category->sort = $request->sort;
        $category->title = $title;
        $category->name = $name;
        $category->slug = $slug;
        $category->images = $save;
        $category->description = $description;
        $category->published = true;
        $category->kategorie = $title;
        $category->published_at = $published_at;
        $category->save();

        Toastr::success('Kategorie erfolgreich geändert!', 'ERFOLGREICH');
        return redirect()->route('admin.kategorien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
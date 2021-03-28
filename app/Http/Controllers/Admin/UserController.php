<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role_or_permission:Admin|Inhaber|create user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('admin.user.index', compact('users', $users, 'roles', $roles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.user.create', compact('roles', $roles, 'permissions', $permissions));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        if ($request->has('role')) {
            $user->assignRole($request->role);
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        $user->save();

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->with('permissions')->findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $permissions = Permission::pluck('name','name')->all();
        $userPermission = $user->permissions->pluck('name','name')->all();

        return view('admin.user.edit', compact('user', $user, 'roles', 'userRole', 'permissions', 'userPermission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
//            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);

        $input = $request->all();

        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        DB::table('model_has_permissions')->where('model_id',$id)->delete();

        if ($request->has('role')) {
            $user->assignRole($request->input('role'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->input('permissions'));
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user);
        /*dd($id);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();*/
    }

    // Benutzerdefinierte Funktionen

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function postProfile(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        $message = __('Profile Successfully Updated');

        return redirect()->back()->withSuccess($message);
    }

    public function getPassword()
    {
        return view('admin.profile.password');
    }

    public function postPassword(Request $request)
    {
        $this->validate($request, [
            'newpassword' => 'required|min:8|max:30|confirmed'
        ]);

        $user = auth()->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->route('admin.user.profile')->withSuccess(trans('Password has been changed'));
    }

    public function photo()
    {
        return view('admin.profile.photo');
    }

    public function postPhoto(Request $request)
    {
        dd($request->all());
    }
}
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend
Route::as('frontend.')->group(function () {
    Route::get('/', 'Frontend\IndexController@index')->name('index');
    Route::get('/speisekarte', 'Frontend\IndexController@speisekarteIndex')->name('speisekarte.index');
    Route::get('/speisekarte/pdf', 'Frontend\IndexController@speisekartePDFIndex')->name('speisekarte.pdf.index');
    Route::get('/lieferservice', 'Frontend\IndexController@lieferserviceIndex')->name('lieferservice.index');
    Route::get('/kontakt', 'Frontend\IndexController@kontaktIndex')->name('kontakt.index');
    Route::post('/kontakt', 'Frontend\IndexController@kontaktStore')->name('kontakt.store');
    Route::get('/impressum', 'Frontend\IndexController@impressumIndex')->name('impressum.index');
    Route::get('/datenschutz', 'Frontend\IndexController@datenschutzIndex')->name('datenschutz.index');
});

Route::get('/emails', function () {
    view('emails.kontakt');
});

// Admin menu
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->as('admin.')->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('admin')->group(function () {
        Route::resource('management/user', 'Admin\UserController');
        Route::get('benutzereinstellungen/profile', 'Admin\UserController@profile')->name('user.profile');
        Route::post('benutzereinstellungen/profile', 'Admin\UserController@postProfile')->name('user.postProfile');
        Route::resource('benutzereinstellungen/photo', 'Admin\ImageController')->only('index', 'store');
        Route::get('benutzereinstellungen/password/change', 'Admin\UserController@getPassword')->name('user.getPassword');
        Route::post('benutzereinstellungen/password/change', 'Admin\UserController@postPassword')->name('user.postPassword');
        Route::resource('management/permission', 'Admin\PermissionController');
        Route::resource('management/role', 'Admin\RoleController');
        Route::resource('speisekarte', 'Admin\SpeisekarteController');
        Route::get('api/speisekarte', 'Admin\SpeisekarteController@speisekarteData')->name('api.speisekarte.data');
        Route::resource('firma', 'Admin\FirmasController');
        Route::get('firma/oeffnungszeiten/{oeffnungszeiten}/edit', 'Admin\FirmasController@oeffnungszeitenEdit')->name('oeffnungszeiten.edit');
        Route::post('firma/oeffnungszeiten', 'Admin\FirmasController@oeffnungszeitenStore')->name('oeffnungszeiten.store');
        Route::match(['put', 'patch'],'firma/oeffnungszeiten/{oeffnungszeiten}', 'Admin\FirmasController@oeffnungszeitenUpdate')->name('oeffnungszeiten.update');
        Route::get('firma/lieferzeiten/{lieferzeiten}/edit', 'Admin\FirmasController@lieferzeitenEdit')->name('lieferzeiten.edit');
        Route::post('firma/lieferzeiten', 'Admin\FirmasController@lieferzeitenStore')->name('lieferzeiten.store');
        Route::match(['put', 'patch'],'firma/lieferzeiten/{lieferzeiten}', 'Admin\FirmasController@lieferzeitenUpdate')->name('lieferzeiten.update');
        Route::resource('zutaten', 'Admin\ZutatensController');
        Route::resource('kategorien', 'Admin\CategoriesController');
    });
});



// axios Anfrage

Route::get('/getAllPermission', 'Admin\PermissionController@getAllPermissions');
//Route::post('/postRole', 'Admin\RoleController@store');
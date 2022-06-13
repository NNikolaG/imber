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

Route::post('/signin', [\App\Http\Controllers\AuthController::class, 'signin'])->name('signin');
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup');
Route::post('/contact', [\App\Http\Controllers\AuthController::class, 'contact'])->name('contact');

Route::middleware(['signedout'])->group(function () {
    Route::get('/', [\App\Http\Controllers\AuthController::class, 'index'])->name('welcome');
});

Route::middleware(['signedin'])->group(function () {
//    Resource Routes
    Route::resource('/home', \App\Http\Controllers\PostController::class);
    Route::resource('/profiles', \App\Http\Controllers\ProfilesController::class);
//    Get Routes
    Route::get('/signout', [\App\Http\Controllers\AuthController::class, 'signout'])->name('signout');
    Route::get('/error', [\App\Http\Controllers\AuthController::class, 'error'])->name('error');
    Route::get('/messages', [\App\Http\Controllers\MessagesController::class, 'index'])->name('messages');
    Route::get('/settings/{username}', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
//    Post Routes
    Route::post('/image-resize', [\App\Http\Controllers\FileController::class, 'imgResize'])->name('img-resize');

    Route::post('/comment', [\App\Http\Controllers\AjaxController::class, 'comments']);
    Route::post('/like', [\App\Http\Controllers\AjaxController::class, 'likes']);
    Route::post('/follow', [\App\Http\Controllers\AjaxController::class, 'follow']);

    Route::post('/change-password', [\App\Http\Controllers\SettingsController::class, 'changePassword'])->name('changePassword');
    Route::post('/deactivate/{id}', [\App\Http\Controllers\SettingsController::class, 'deactivate'])->name('deactivate');
    Route::post('/message', [\App\Http\Controllers\MessagesController::class, 'message']);
    Route::get('/messagesFetch', [\App\Http\Controllers\MessagesController::class, 'messageFetch']);

    Route::get('/pagination', [\App\Http\Controllers\ProfilesController::class, 'fetchData']);
    Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
});

Route::middleware(['admin'])->group(function () {
    // Account Control
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('accountCtrl');
    Route::post('/roleUpdate/{id}', [\App\Http\Controllers\AdminController::class, 'roleUpdate'])->name('roleUpdate');
    Route::post('/status/{id}', [\App\Http\Controllers\AdminController::class, 'status'])->name('status');
    // Roles
    Route::get('/role-edit', [\App\Http\Controllers\AdminController::class, 'roleEdit'])->name('roleEdit');
    Route::post('/role-add', [\App\Http\Controllers\AdminController::class, 'createRole'])->name('createRole');
    Route::post('/role-delete', [\App\Http\Controllers\AdminController::class, 'deleteRole'])->name('deleteRole');
    Route::get('/get-role', [\App\Http\Controllers\AjaxController::class, 'returnRole']);
    Route::post('/update-role', [\App\Http\Controllers\AdminController::class, 'updateRole'])->name('updateRole');
    // NavLinks
    Route::get('/nav-edit', [\App\Http\Controllers\AdminController::class, 'navEdit'])->name('navEdit');
    Route::post('/nav-add', [\App\Http\Controllers\AdminController::class, 'createNav'])->name('createNav');
    Route::post('/nav-delete', [\App\Http\Controllers\AdminController::class, 'deleteNav'])->name('deleteNav');
    Route::get('/get-nav', [\App\Http\Controllers\AjaxController::class, 'returnNav']);
    Route::post('/update-nav', [\App\Http\Controllers\AdminController::class, 'updateNav'])->name('updateNav');
    //Logs
    Route::get('/logs', [\App\Http\Controllers\AdminController::class, 'logs'])->name('logs');
    Route::get('/fetch-logs', [\App\Http\Controllers\AjaxController::class, 'fetchLogs']);
});



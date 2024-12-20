<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

if (Auth::check()) {
    // The user is logged in...
    dd("logged");
}
Route::get('/', [App\Http\Controllers\PuppyController::class, 'index']);

// admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
// puppies routes    
Route::get('/puppy/new', [App\Http\Controllers\PuppyController::class, 'create'])->name('admin.puppy.create');
Route::get('/puppy/all', [App\Http\Controllers\PuppyController::class, 'list'])->name('admin.puppy.list');
Route::get('/puppy/edit/{id}', [App\Http\Controllers\PuppyController::class, 'edit'])->name('admin.puppy.edit');
Route::patch('/puppy/update/{id}', [App\Http\Controllers\PuppyController::class, 'update'])->name('admin.puppy.update');
Route::post('/puppy/delete/', [App\Http\Controllers\PuppyController::class, 'destroy'])->name('admin.puppy.delete');
Route::post('/ai/new', [App\Http\Controllers\AiController::class, 'create'])->name('admin.ai.create');
Route::patch('/ai/new', [App\Http\Controllers\AiController::class, 'create'])->name('admin.ai.patch');

Route::get('/users/all', [App\Http\Controllers\UsersController::class, 'index'])->name('admin.user.list');
Route::get('/user/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('admin.user.edit');
Route::post('/user/delete/', [App\Http\Controllers\UsersController::class, 'destroy'])->name('admin.user.delete');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('admin.setting.list');
Route::post('/settings/update/', [App\Http\Controllers\SettingsController::class, 'update'])->name('admin.settings.update');

Route::get('/breed/new', [App\Http\Controllers\BreedController::class, 'create'])->name('admin.breed.create');
Route::get('/breed/edit/{id}', [App\Http\Controllers\BreedController::class, 'edit'])->name('admin.breed.edit');


Route::post('/puppy/add', [App\Http\Controllers\PuppyController::class, 'store'])->name('puppySave');

Route::get('/breed/all', [App\Http\Controllers\BreedController::class, 'list'])->name('admin.breed.list');
Route::post('/breed/delete/', [App\Http\Controllers\BreedController::class, 'destroy'])->name('admin.breed.delete');
});

// front routes
Route::get('/puppy/{id}/{name}', [App\Http\Controllers\PuppyController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('facebook')->user();
 
    // $user->token
});

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/photo-details', [HomeController::class, 'photoDetails'])->name('photo.details');

Route::get('/videos', [VideoController::class, 'index'])->name('video.index');
Route::get('/video-details', [VideoController::class, 'videoDetails'])->name('video.details');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/terms-and-conditions', [OthersController::class, 'termsAndConditions'])->name('trems.conditions');
Route::get('/privacy-policy', [OthersController::class, 'privacyPolicy'])->name('privacy.policy');


Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('admin.user.profile');
    Route::get('/user-avatar-remove/{id}', [UserController::class, 'userAvatarsRemove'])->name('user.avatar.remove');
    Route::get('/add-user', [UserController::class, 'addUser'])->name('admin.user.add');
    Route::post('/store-user', [UserController::class, 'storeUser'])->name('admin.user.store');
    Route::post('/update-user', [UserController::class, 'userProfileUpdate'])->name('admin.user.update');
});

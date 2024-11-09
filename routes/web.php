<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\PhotoController as AdminPhotoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\PhotoController;
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

Route::get('/photos', [PhotoController::class, 'index'])->name('photo.index');
Route::get('/photo-details/{id}', [PhotoController::class, 'photoDetails'])->name('photo.details');

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
    Route::post('/user-disabled', [UserController::class, 'userDisable'])->name('user.disabled');
    Route::get('/add-user', [UserController::class, 'addUser'])->name('admin.user.add');
    Route::post('/store-user', [UserController::class, 'storeUser'])->name('admin.user.store');
    Route::post('/update-user', [UserController::class, 'userProfileUpdate'])->name('admin.user.update');
    Route::get('/user-profile/{id}', [UserController::class, 'viewUserProfile'])->name('admin.user.profile.view');
    Route::get('/edit-user-profile/{id}', [UserController::class, 'editUserProfile'])->name('admin.user.profile.edit');
    Route::post('/update-user-profile', [UserController::class, 'updateUserProfile'])->name('admin.user.profile.update');
    Route::delete('/delete-user-profile', [UserController::class, 'deleteUserProfile'])->name('admin.user.profile.delete');

    Route::get('/photos', [AdminPhotoController::class, 'index'])->name('admin.photos.index');
    Route::get('/add-photo', [AdminPhotoController::class, 'addPhoto'])->name('admin.photo.add');
    Route::post('/store-photo', [AdminPhotoController::class, 'storePhoto'])->name('admin.photo.store');
    Route::get('/approved-photo/{id}', [AdminPhotoController::class, 'photoApproved'])->name('admin.photo.approved');
    Route::get('/rejected-photo/{id}', [AdminPhotoController::class, 'photoRejected'])->name('admin.photo.rejected');
    Route::get('/photo-featured/{id}', [AdminPhotoController::class, 'photoFeatured'])->name('admin.photo.featured');
});

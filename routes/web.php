<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\frontend\JoblistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/job-listing', [JoblistController::class, 'index'])->name('job-listing');
Route::get('/job-listing/{slug}', [JoblistController::class, 'show'])->name('job-detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('contact.store');
Route::post('/register', [RegisterController::class, 'store'])->name('register-proses');
Route::get('/search', [JoblistController::class, 'search'])->name('search');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');





Route::middleware(['auth', 'UserAccess:admin', ''])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::resource('profile', ProfileController::class);
        Route::resource('company', CompanyController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('job', JobController::class);
        Route::resource('user', UserController::class);
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::get('/daftarpelamar/{slug}', [PelamarController::class, 'daftarpelamar'])->name('daftarpelamar');
    });
});



//  ---------------validating email--------------------
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('dashboarduser');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser');
    Route::get('/dashboarduser/edit/{id}', [DashboardUserController::class, 'edit'])->name('dashboarduser.edit');
    Route::put('/dasboarduser/update/{id}', [DashboardUserController::class, 'update'])->name('dashboarduser.update');
    Route::post('/dashboarduser/uploadcv', [DashboardUserController::class, 'uploadCv'])->name('dashboarduser.uploadcv');
    Route::get('/dashboarduser/editCv/{id}', [DashboardUserController::class, 'editCv'])->name('dashboarduser.editCv');
    Route::put('/dashboarduser/updateCv/{id}', [DashboardUserController::class, 'updateCv'])->name('dashboarduser.updateCv');

    // apply Job
    Route::get('/applyjob/{slug}', [JoblistController::class, 'applyJob'])->name('applyjob');
    Route::post('/applyjob/save/{slug}', [JoblistController::class, 'applyStore'])->name('applyStore');
});

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/job-listing', [JoblistController::class, 'index'])->name('job-listing');
Route::get('/job-listing/{slug}', [JoblistController::class, 'show'])->name('job-detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('contact.store');
// Route::post('/register', [RegisterController::class, 'store'])->name('register-proses');
Route::get('/search', [JoblistController::class, 'search'])->name('search');
Route::get('/search-category', [JoblistController::class, 'searchCategory'])->name('search-category');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
//filter category
Route::get('job-listing/category/{slug}', [JoblistController::class, 'category'])->name('job-category');


Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Routes accessible by admin and superadmin
        Route::middleware('UserAccess:admin,superadmin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin');
            Route::resource('profile', ProfileController::class)->only(['index', 'update']);
            Route::resource('company', CompanyController::class);
            Route::resource('job', JobController::class);

            Route::get('/daftarpelamar/{slug}', [PelamarController::class, 'daftarpelamar'])->name('daftarpelamar');
            Route::post('/dashboard/send-email/{id}', [PelamarController::class, 'sendEmail'])->name('daftarpelamar.send_email');

            Route::get('download_cv/{id}', [PelamarController::class, 'download_cv'])->name('download_cv');
            Route::get('download_document/{id}', [PelamarController::class, 'download_document'])->name('download_document');

            // update status pelamar
            Route::patch('/jobseekers/{id}/update-status', [PelamarController::class, 'updateStatus'])->name('daftarpelamat.update');
            // update status job
            Route::post('/updatejob/{id}/close', [JobController::class, 'UpdateStatusClose'])->name('updatestatusclose');
            Route::post('/updatejob/{id}/open', [JobController::class, 'updateStatusOpen'])->name('updatestatusopen');
        });

        // Routes only by superadmin
        Route::middleware('UserAccess:superadmin')->group(function () {
            Route::resource('category', CategoryController::class);
            Route::resource('user', UserController::class);
            Route::get('/contact', [ContactController::class, 'index'])->name('contact');
            Route::delete('/contact_delete/{id}', [ContactController::class, 'destroy'])->name('contactDelete');
        });

    });
});







//  ---------------validating email--------------------
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect()->route('dashboarduser');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Auth::routes(['verify' => true]);
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

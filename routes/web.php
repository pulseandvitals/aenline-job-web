<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('job-offer')->name('job-offer.')->group(function () {
    Route::get('/', [JobOfferController::class,'index'])->name('index');
    Route::get('/create',[JobOfferController::class,'create'])->name('create');
    Route::post('/store', [JobOfferController::class,'store'])->name('store');
    Route::delete('/destroy/{jobOffer}', [JobOfferController::class,'destroy'])->name('destroy');
    Route::get('/view/{jobOffer}',[JobOfferController::class,'show'])->name('show');
});

Route::middleware('auth')->prefix('application')->name('application.')->group(function () {
    Route::get('/', [ApplicationController::class,'index'])->name('index');
});

Route::get('/',[IndexController::class,'jobList'])->name('job-list');
Route::get('/view/job/{viewJobDescription}',[IndexController::class,'viewJobOffer'])->name('view-job-description');
Route::post('/store/application', [IndexController::class,'storeApplication'])->name('store-application');

require __DIR__.'/auth.php';

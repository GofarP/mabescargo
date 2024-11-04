<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\LandingPageController::class,'index'])->name('index');
Route::get('/about',[App\Http\Controllers\LandingPageController::class,'about'])->name('about');
Route::get('/service',[App\Http\Controllers\LandingPageController::class,'service'])->name('service');
Route::get('/contact',[App\Http\Controllers\LandingPageController::class,'contact'])->name('contact');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('wilayah', App\Http\Controllers\WilayahController::class)->names('wilayah');
Route::resource('tingkatanwilayah', App\Http\Controllers\TingkatanWilayahController::class)->names('tingkatanwilayah');
Route::resource('cabang', App\Http\Controllers\CabangController::class)->names('cabang');
Route::resource('customer', App\Http\Controllers\CustomerController::class)->names('customer');
Route::resource('customerlama', App\Http\Controllers\CustomerLamaController::class)->names('customerlama');
Route::resource('kategoricustomer', App\Http\Controllers\KategoriCustomerController::class)->names('kategoricustomer');
Route::resource('tipecustomer', App\Http\Controllers\TipeCustomerController::class)->names('tipecustomer');
Route::resource('kontak', App\Http\Controllers\KontakController::class)->names('kontak');
Route::resource('karyawan', App\Http\Controllers\KaryawanController::class)->names('karyawan');
Route::resource('followupcustomer', App\Http\Controllers\FollowupCustomerController::class)->names('followupcustomer');
Route::resource('followupcustomerlama', App\Http\Controllers\FollowupCustomerLamaController::class)->names('followupcustomerlama');

Route::post('customer/print',[App\Http\Controllers\CustomerController::class, 'print'])->name('customer_print');
Route::post('followupcustomer/print',[App\Http\Controllers\FollowupCustomerController::class, 'print'])->name('followup_customer_print');
Route::post('followupcustomerlama/print',[App\Http\Controllers\FollowupCustomerLamaController::class, 'print'])->name('followup_customer_lama_print');

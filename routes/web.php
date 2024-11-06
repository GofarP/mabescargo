<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| beprotected $fillable = ['nama'];ed to the "web" middleware group. Make something great!
|
*/

Route::singularResourceParameters(false);

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
Route::resource('followuptraffic', App\Http\Controllers\FollowupTrafficController::class)->names('followuptraffic');
Route::resource('statuspembayaran', App\Http\Controllers\StatusPembayaranController::class)->names('statuspembayaran');
Route::resource('metodepembayaran', App\Http\Controllers\MetodePembayaranController::class)->names('metodepembayaran');
Route::resource('jalur', App\Http\Controllers\JalurController::class)->names('jalur');
Route::resource('pesananmbs', App\Http\Controllers\PesananMbsController::class)->names('pesananmbs');
Route::resource('sebarbrosur', App\Http\Controllers\SebarBrosurController::class)->names('sebarbrosur');
Route::resource('salesafterservice', App\Http\Controllers\SalesAfterServiceController::class)->names('salesafterservice');
Route::resource('daftarharga', App\Http\Controllers\DaftarHargaController::class)->names('daftarharga');
Route::resource('statusmanifes', App\Http\Controllers\StatusManifesController::class)->names('statusmanifes');
Route::resource('mtc', App\Http\Controllers\MTCController::class)->names('mtc');
Route::resource('datavendor', App\Http\Controllers\VendorController::class)->names('datavendor');



Route::post('customer/print',[App\Http\Controllers\CustomerController::class, 'print'])->name('customer_print');
Route::post('followupcustomer/print',[App\Http\Controllers\FollowupCustomerController::class, 'print'])->name('followup_customer_print');
Route::post('followupcustomerlama/print',[App\Http\Controllers\FollowupCustomerLamaController::class, 'print'])->name('followup_customer_lama_print');
Route::post('followuptraffic/print',[App\Http\Controllers\FollowupTrafficController::class, 'print'])->name('followup_traffic_print');
Route::post('pesananmbs/print',[App\Http\Controllers\PesananMbsController::class, 'print'])->name('pesanan_mbs_print');
Route::post('sebarbrosur/print',[App\Http\Controllers\SebarBrosurController::class, 'print'])->name('sebar_brosur_print');
Route::post('salesafterservice/print',[App\Http\Controllers\SalesAfterServiceController::class, 'print'])->name('sales_after_service_print');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;

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

Route::get('storage_links', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        dd("Success to storage link");
    } catch (Exception $exception){
        throw $exception;
    }
});

Route::get('lang/{language}', 'LocalizationController@switch')->name('localization.switch');
Route::get('/', 'BerandaController@index');
Route::get('/about_us', 'TentangController@index');
Route::get('/career', 'KarirController@index');
Route::get('/news', 'BeritaController@index');
Route::get('/order', 'PesanController@index');
Route::get('/career/daftar', 'KarirController@daftar')->name('karir');
Route::post('/career/daftar', 'KarirController@pelamar')->name('pelamar');
Route::resource('shipping_rates', 'ShippingRateController');

// Route::get('/', 'FrontendController@index')->name('welcome');

Auth::routes(['verify' => true, 'register'=>false]);

Route::middleware('auth')->group(function () {

    Route::get('/admin/home', 'HomeController@index')->name('dashboard');

    //Karir
    Route::get('/admin/Lowongan', 'LowonganController@index')->name('lowongan');
    Route::post('/admin/tambah/karir', 'LowonganController@store')->name('store.lowongan');

    // Pelamar
    Route::get('/admin/pelamar', 'LowonganController@pelamar')->name('admin.pelamar');
    Route::get('/admin/pelamar/{id}', 'LowonganController@show')->name('show.pelamar');

    //Gambar
    Route::get('/admin/gambar', 'GambarController@index')->name('home.gambar');
    Route::post('/admin/gambar', 'GambarController@store')->name('store.gambar');
    Route::get('/admin/gambar/show/{id}', 'GambarController@show')->name('show.gambar');

    Route::get('/admin/berita', 'BeritaController@berita')->name('berita');
    Route::post('/admin/berita', 'BeritaController@store')->name('store.berita');

    Route::get('/admin/shipping_rates', 'ShippingRateController@admin_index')->name('admin.shipping_rates');
});

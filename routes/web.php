<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;


use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('logout','App\Http\Controllers\LoginController@logout')->middleware('auth')->name('logout');
Route::get('/home','App\Http\Controllers\HomeController@home')->name('home1');

Route::group(['middleware' => ['role']], function () {

    //dashboard
    Route::get('dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');

    //user
    Route::get('dashboard/user',[UserController::class,'user'])->middleware('auth');
    Route::post('dashboard/user/store',[UserController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/user/edit/{id}', [UserController::class,'edit']);
    Route::get('dashboard/user/delete/{id}',[UserController::class,'delete']);
    Route::get('dashboard/user/bin',[UserController::class,'bin'])->middleware('auth');
    Route::get('dashboard/user/restore/{id?}',[UserController::class,'restore']);
    Route::get('dashboard/user/deleteperm/{id?}',[UserController::class,'deleteperm']);

    //role
    Route::get('dashboard/role',[RoleController::class,'role'])->middleware('auth');
    Route::post('dashboard/role/store',[RoleController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/role/edit/{id}', [RoleController::class,'edit']);
    Route::get('dashboard/role/delete/{id}',[RoleController::class,'delete']);
    Route::get('dashboard/role/bin',[RoleController::class,'bin'])->middleware('auth');
    Route::get('dashboard/role/restore/{id?}',[RoleController::class,'restore']);
    Route::get('dashboard/role/deleteperm/{id?}',[RoleController::class,'deleteperm']);

    //provinsi
    Route::get('dashboard/provinsi',[ProvinsiController::class,'provinsi'])->middleware('auth');
    Route::post('dashboard/provinsi/store',[ProvinsiController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/provinsi/edit/{id}', [ProvinsiController::class,'edit']);
    Route::get('dashboard/provinsi/delete/{id}',[ProvinsiController::class,'delete']);
    Route::get('dashboard/provinsi/bin',[ProvinsiController::class,'bin'])->middleware('auth');
    Route::get('dashboard/provinsi/restore/{id?}',[ProvinsiController::class,'restore']);
    Route::get('dashboard/provinsi/deleteperm/{id?}',[ProvinsiController::class,'deleteperm']);

    //kategori bencana
    Route::get('dashboard/kategori',[KategoriController::class,'kategori'])->middleware('auth');
    Route::post('dashboard/kategori/store',[KategoriController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/kategori/edit/{id}', [KategoriController::class,'edit']);
    Route::get('dashboard/kategori/delete/{id}',[KategoriController::class,'delete']);
    Route::get('dashboard/kategori/bin',[KategoriController::class,'bin'])->middleware('auth');
    Route::get('dashboard/kategori/restore/{id?}',[KategoriController::class,'restore']);
    Route::get('dashboard/kategori/deleteperm/{id?}',[KategoriController::class,'deleteperm']);

    //kota
    Route::get('dashboard/kota',[KotaController::class,'kota'])->middleware('auth');
    Route::post('dashboard/kota/store',[KotaController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/kota/edit/{id}', [KotaController::class,'edit']);
    Route::get('dashboard/kota/delete/{id}',[KotaController::class,'delete']);
    Route::get('dashboard/kota/bin',[KotaController::class,'bin'])->middleware('auth');
    Route::get('dashboard/kota/restore/{id?}',[KotaController::class,'restore']);
    Route::get('dashboard/kota/deleteperm/{id?}',[KotaController::class,'deleteperm']);

    //kecamatan
    Route::get('dashboard/dashboard/dashboard/kecamatan',[KecamatanController::class,'kecamatan'])->middleware('auth');
    Route::post('dashboard/dashboard/dashboard/kecamatan/store',[KecamatanController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/dashboard/dashboard/kecamatan/edit/{id}', [KecamatanController::class,'edit']);
    Route::get('dashboard/dashboard/dashboard/kecamatan/delete/{id}',[KecamatanController::class,'delete']);
    Route::get('dashboard/dashboard/dashboard/kecamatan/bin',[KecamatanController::class,'bin'])->middleware('auth');
    Route::get('dashboard/dashboard/dashboard/kecamatan/restore/{id?}',[KecamatanController::class,'restore']);
    Route::get('dashboard/dashboard/dashboard/kecamatan/deleteperm/{id?}',[KecamatanController::class,'deleteperm']);

    //bencana
    Route::get('dashboard/dashboard/bencana',[BencanaController::class,'bencana'])->middleware('auth');
    Route::post('dashboard/dashboard/bencana/store',[BencanaController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/dashboard/bencana/edit/{id}', [BencanaController::class,'edit']);
    Route::get('dashboard/dashboard/bencana/delete/{id}',[BencanaController::class,'delete']);
    Route::get('dashboard/dashboard/bencana/bin',[BencanaController::class,'bin'])->middleware('auth');
    Route::get('dashboard/dashboard/bencana/restore/{id?}',[BencanaController::class,'restore']);
    Route::get('dashboard/dashboard/bencana/deleteperm/{id?}',[BencanaController::class,'deleteperm']);

    //pelaporan
    Route::get('dashboard/pelaporan',[PelaporanController::class,'pelaporan'])->middleware('auth');
    Route::post('dashboard/pelaporan/store',[PelaporanController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/pelaporan/edit/{id}', [PelaporanController::class,'edit']);
    Route::get('dashboard/pelaporan/delete/{id}',[PelaporanController::class,'delete']);
    Route::get('dashboard/pelaporan/bin',[PelaporanController::class,'bin'])->middleware('auth');
    Route::get('dashboard/pelaporan/restore/{id?}',[PelaporanController::class,'restore']);
    Route::get('dashboard/pelaporan/deleteperm/{id?}',[PelaporanController::class,'deleteperm']);

    //detail
    Route::get('dashboard/detail',[DetailController::class,'detail'])->middleware('auth');
    Route::post('dashboard/detail/store',[DetailController::class,'store']);
    Route::match(['get', 'post'], 'dashboard/detail/edit/{id}', [DetailController::class,'edit']);
    Route::get('dashboard/detail/delete/{id}',[DetailController::class,'delete']);
    Route::get('dashboard/detail/bin',[DetailController::class,'bin'])->middleware('auth');
    Route::get('dashboard/detail/restore/{id?}',[DetailController::class,'restore']);
    Route::get('dashboard/detail/deleteperm/{id?}',[DetailController::class,'deleteperm']);

});
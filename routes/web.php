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

// Route::get('/', function () {
//     return view('login');
// });

Route::group(['Middleware'=>'Auth'],function()
{
    Route::get('/',function()
    {
        return view('login');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

Route::get('logout','App\Http\Controllers\LoginController@logout')->middleware('auth')->name('logout');

Route::get('home', 'App\Http\Controllers\HomeController@index')->middleware('auth')->name('home');

//user
Route::get('user',[UserController::class,'user'])->middleware('auth');
Route::post('user/store',[UserController::class,'store']);
Route::match(['get', 'post'], 'user/edit/{id}', [UserController::class,'edit']);
Route::get('user/delete/{id}',[UserController::class,'delete']);
Route::get('user/bin',[UserController::class,'bin'])->middleware('auth');
Route::get('user/restore/{id?}',[UserController::class,'restore']);
Route::get('user/deleteperm/{id?}',[UserController::class,'deleteperm']);

//role
Route::get('role',[RoleController::class,'role'])->middleware('auth');
Route::post('role/store',[RoleController::class,'store']);
Route::match(['get', 'post'], 'role/edit/{id}', [RoleController::class,'edit']);
Route::get('role/delete/{id}',[RoleController::class,'delete']);
Route::get('role/bin',[RoleController::class,'bin'])->middleware('auth');
Route::get('role/restore/{id?}',[RoleController::class,'restore']);
Route::get('role/deleteperm/{id?}',[RoleController::class,'deleteperm']);

//provinsi
Route::get('provinsi',[ProvinsiController::class,'provinsi'])->middleware('auth');
Route::post('provinsi/store',[ProvinsiController::class,'store']);
Route::match(['get', 'post'], 'provinsi/edit/{id}', [ProvinsiController::class,'edit']);
Route::get('provinsi/delete/{id}',[ProvinsiController::class,'delete']);
Route::get('provinsi/bin',[ProvinsiController::class,'bin'])->middleware('auth');
Route::get('provinsi/restore/{id?}',[ProvinsiController::class,'restore']);
Route::get('provinsi/deleteperm/{id?}',[ProvinsiController::class,'deleteperm']);

//kategori bencana
Route::get('kategori',[KategoriController::class,'kategori'])->middleware('auth');
Route::post('kategori/store',[KategoriController::class,'store']);
Route::match(['get', 'post'], 'kategori/edit/{id}', [KategoriController::class,'edit']);
Route::get('kategori/delete/{id}',[KategoriController::class,'delete']);
Route::get('kategori/bin',[KategoriController::class,'bin'])->middleware('auth');
Route::get('kategori/restore/{id?}',[KategoriController::class,'restore']);
Route::get('kategori/deleteperm/{id?}',[KategoriController::class,'deleteperm']);

//kota
Route::get('kota',[KotaController::class,'kota'])->middleware('auth');
Route::post('kota/store',[KotaController::class,'store']);
Route::match(['get', 'post'], 'kota/edit/{id}', [KotaController::class,'edit']);
Route::get('kota/delete/{id}',[KotaController::class,'delete']);
Route::get('kota/bin',[KotaController::class,'bin'])->middleware('auth');
Route::get('kota/restore/{id?}',[KotaController::class,'restore']);
Route::get('kota/deleteperm/{id?}',[KotaController::class,'deleteperm']);

//kecamatan
Route::get('kecamatan',[KecamatanController::class,'kecamatan'])->middleware('auth');
Route::post('kecamatan/store',[KecamatanController::class,'store']);
Route::match(['get', 'post'], 'kecamatan/edit/{id}', [KecamatanController::class,'edit']);
Route::get('kecamatan/delete/{id}',[KecamatanController::class,'delete']);
Route::get('kecamatan/bin',[KecamatanController::class,'bin'])->middleware('auth');
Route::get('kecamatan/restore/{id?}',[KecamatanController::class,'restore']);
Route::get('kecamatan/deleteperm/{id?}',[KecamatanController::class,'deleteperm']);

//bencana
Route::get('bencana',[BencanaController::class,'bencana'])->middleware('auth');
Route::post('bencana/store',[BencanaController::class,'store']);
Route::match(['get', 'post'], 'bencana/edit/{id}', [BencanaController::class,'edit']);
Route::get('bencana/delete/{id}',[BencanaController::class,'delete']);
Route::get('bencana/bin',[BencanaController::class,'bin'])->middleware('auth');
Route::get('bencana/restore/{id?}',[BencanaController::class,'restore']);
Route::get('bencana/deleteperm/{id?}',[BencanaController::class,'deleteperm']);

//pelaporan
Route::get('pelaporan',[PelaporanController::class,'pelaporan'])->middleware('auth');
Route::post('pelaporan/store',[PelaporanController::class,'store']);
Route::match(['get', 'post'], 'pelaporan/edit/{id}', [PelaporanController::class,'edit']);
Route::get('pelaporan/delete/{id}',[PelaporanController::class,'delete']);
Route::get('pelaporan/bin',[PelaporanController::class,'bin'])->middleware('auth');
Route::get('pelaporan/restore/{id?}',[PelaporanController::class,'restore']);
Route::get('pelaporan/deleteperm/{id?}',[PelaporanController::class,'deleteperm']);

//detail
Route::get('detail',[DetailController::class,'detail'])->middleware('auth');
Route::post('detail/store',[DetailController::class,'store']);
Route::match(['get', 'post'], 'detail/edit/{id}', [DetailController::class,'edit']);
Route::get('detail/delete/{id}',[DetailController::class,'delete']);
Route::get('detail/bin',[DetailController::class,'bin'])->middleware('auth');
Route::get('detail/restore/{id?}',[DetailController::class,'restore']);
Route::get('detail/deleteperm/{id?}',[DetailController::class,'deleteperm']);
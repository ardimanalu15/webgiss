<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\PTController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;


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

Route::get('/', [WebController::class, 'index']);

Auth::routes();
Route::get('/web', [WebController::class, 'web']);
Route::get('/carisekolah', [WebController::class, 'carisekolah']);
Route::get('/caript', [WebController::class, 'caript']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Kabupaten
Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten');
Route::get('/kabupaten/tambah', [KabupatenController::class, 'tambah']);
Route::post('/kabupaten/insert', [KabupatenController::class, 'insert']);
Route::get('/kabupaten/edit/{id_kabupaten}', [KabupatenController::class, 'edit']);
Route::post('/kabupaten/update/{id_kabupaten}', [KabupatenController::class, 'update']);
Route::get('/kabupaten/delete/{id_kabupaten}', [KabupatenController::class, 'delete']);

//Jenjang
Route::get('/jenjang', [JenjangController::class, 'index'])->name('jenjang');
Route::get('/jenjang/tambah', [JenjangController::class, 'tambah']);
Route::post('/jenjang/insert', [JenjangController::class, 'insert']);
Route::get('/jenjang/edit/{id_jenjang}', [JenjangController::class, 'edit']);
Route::post('/jenjang/update/{id_jenjang}', [JenjangController::class, 'update']);
Route::get('/jenjang/delete/{id_jenjang}', [JenjangController::class, 'delete']);

//Perguruan Tinggi
Route::get('/perguruantinggi', [PTController::class, 'index'])->name('perguruantinggi');
Route::get('/perguruantinggi/tambah', [PTController::class, 'tambah']);
Route::post('/perguruantinggi/insert', [PTController::class, 'insert']);
Route::get('/perguruantinggi/edit/{id_pt}', [PTController::class, 'edit']);
Route::post('/perguruantinggi/update/{id_pt}', [PTController::class, 'update']);
Route::get('/perguruantinggi/delete/{id_pt}', [PTController::class, 'delete']);

//Sekolah
Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
Route::get('/sekolah/tambah', [SekolahController::class, 'tambah']);
Route::post('/sekolah/insert', [SekolahController::class, 'insert']);
Route::get('/sekolah/edit/{id_sekolah}', [SekolahController::class, 'edit']);
Route::post('/sekolah/update/{id_sekolah}', [SekolahController::class, 'update']);
Route::get('/sekolah/delete/{id_sekolah}', [SekolahController::class, 'delete']);

//User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

//Frontend
Route::get('/kabupaten/{id_kabupaten}', [WebController::class, 'kabupaten']);
Route::get('/jenjang/{id_jenjang}', [WebController::class, 'jenjang']);

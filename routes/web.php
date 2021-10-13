<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;

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
//     return view('welcome');
// });

Route::get('/siswa'/*Membuat link sendiri */, [siswaController::class, 'index']); // jalur untuk mengambil data
Route::post('/siswa/create', [siswaController::class, 'create']); // jalur untuk mengirim data
Route::get('/siswa/{id}/update', [siswaController::class, 'update']); // jalur untuk mengambil data berdasarkan id saja
Route::post('/siswa/{id}/update', [siswaController::class, 'prosesupdate']);
Route::get('/siswa/{id}/delete', [siswaController::class, 'delete']);
Route::post('/siswa/import_excel', [siswaController::class, 'import_excel']);


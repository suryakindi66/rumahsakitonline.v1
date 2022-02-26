<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\LoginAdminController;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

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
    return view('welcome');
});



/*pendaftaran route */
Route::get('/pendaftaran', [RegisterController::class, 'index']);
Route::post('/pendaftaran', [RegisterController::class, 'store']);
/*penutup pendaftaran route */

/*area user login dan dashboard */
Route::get('/login', [LoginUserController::class, 'index'])->middleware('verification')->name('login');
Route::post('/login', [LoginUserController::class, 'postlogin'])->name('login');

Route::get('/user/logout', [UserController::class, 'logout']);

/* grouping middleware */
Route::group(['middleware' => ['userverify']], function(){
    Route::get('/user/dashboard', [UserController::class, 'index']);
    Route::get('/user/pengajuan-pendaftaran', [UserController::class, 'indexpengajuan']);
    Route::post('/user/pengajuan-pendaftaran', [UserController::class, 'store']);
    Route::get('/user/history', [UserController::class, 'show']);
    Route::get('/user/batal-pendaftaran/{id}', [UserController::class, 'delete']);
    Route::get('/user/details-dokter', [UserController::class, 'detailsdokter']);
});


/*penutup area user login dan dashboard */

Route::get('/admin/login', [LoginAdminController::class, 'index'])->middleware('authadmin')->name('admin');
Route::post('/admin/login', [LoginAdminController::class, 'postlogin']);

Route::group(['middleware' => ['adminverify']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/jadwal-dokter', [AdminController::class, 'viewcreatedokter'])->name('admin');
    Route::post('/admin/jadwal-dokter', [AdminController::class, 'storecreatedokter'])->name('admin');
    Route::get('/admin/detail-jadwal-dokter', [AdminController::class, 'showdatadokter'])->name('admin');
    Route::get('/admin/datapasien', [AdminController::class, 'showdatapasien'])->name('admin');
    Route::get('/admin/konfirmasi-pendaftaran/{id}', [AdminController::class, 'konfirmasipendaftaran'])->name('admin');
    Route::get('/admin/rejected-pendaftaran/{id}', [AdminController::class, 'rejectedpendaftaran'])->name('admin');
    Route::get('/admin/createpengumuman', [AdminController::class, 'viewcreatepengumuman'])->name('admin');
    Route::post('/admin/createpengumuman', [AdminController::class, 'createpengumuman'])->name('admin');
    Route::get('/admin/deletedokter/{id}', [AdminController::class, 'deletedokter'])->name('admin');
    Route::get('/admin/detailspengumuman', [AdminController::class, 'detailspengumuman'])->name('admin');
    Route::get('/admin/deletepengumuman/{id}', [AdminController::class, 'deletepengumuman'])->name('admin');
    Route::get('/admin/editpengumuman/{id}', [AdminController::class, 'editpengumuman'])->name('admin');
    Route::put('/admin/editpengumuman/{id}', [AdminController::class, 'posteditpengumuman'])->name('admin');
});

Route::get('/admin/logout', [AdminController::class, 'logout']);
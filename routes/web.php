<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
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




Route::middleware('checkSession')->group(function () { 
    route::get('login', [AuthController::class, 'index']);
    route::get('register', [AuthController::class, 'register']);
    route::post('post-login', [AuthController::class, 'postLogin'])->name('login');
    route::post('admin/post-login', [AuthController::class, 'adminLogin'])->name('admin.login');
    route::post('post-register', [AuthController::class, 'postRegister'])->name('register');
    route::get('admin/login', [AuthController::class, 'login']);
});

Route::middleware('checkUser')->group(function () { 
    route::get('/', [UserController::class, 'index'])->name('user.home');    
    route::get('pengaduan', [UserController::class, 'pengaduan']);
    route::get('pengaduan/edit/{id}', [UserController::class, 'editPengaduan']);
    route::post('pengaduan/update/{id}', [UserController::class, 'updatePengaduan'])->name('update.aduan');
    
    route::get('tanggapan/{id}', [UserController::class, 'tanggapan']);
    route::post('post-aduan', [UserController::class, 'postAduan'])->name('post.aduan');
    route::get('logout', [AuthController::class, 'logout']);
});


Route::middleware('checkAdmin')->prefix('admin')->group(function () { 
    route::get('/', [AdminController::class, 'index'])->name('admin.home'); 
    route::post('verification/{id}', [AdminController::class, 'verification'])->name('admin.verification');
    route::get('verified', [AdminController::class, 'verified']); 
    route::get('balasan/{id}', [AdminController::class, 'balasan']);
    route::post('post-tanggapan/{id}', [AdminController::class, 'postTanggapan'])->name('admin.tanggapan');
    route::get('response', [AdminController::class, 'response']); 
    route::get('print/{id}', [AdminController::class, 'print']);
    route::get('detail/{id}', [AdminController::class, 'detail']);
    route::get('petugas', [AdminController::class, 'viewPetugas']); 
    route::get('petugas/create', [AdminController::class, 'createPetugas']); 
    route::post('petugas/post', [AdminController::class, 'postPetugas'])->name('post.petugas');
    route::post('petugas/update/{id}', [AdminController::class, 'updatePetugas'])->name('update.petugas'); 
    route::get('petugas/edit/{id}', [AdminController::class, 'editPetugas']); 
    route::get('petugas/delete/{id}', [AdminController::class, 'destroyPetugas']); 
    route::get('logout', [AuthController::class, 'logout']);
});

Route::middleware('checkPetugas')->prefix('petugas')->group(function () { 
    route::get('/', [PetugasController::class, 'index']);
    route::get('detail/{id}', [PetugasController::class, 'detail']);
    route::get('balasan/{id}', [PetugasController::class, 'balasan']);
    route::get('response', [PetugasController::class, 'response']); 
    route::post('post-tanggapan/{id}', [PetugasController::class, 'postTanggapan'])->name('post.tanggapan');
    route::post('verification/{id}', [PetugasController::class, 'verification'])->name('verification');
    route::get('verified', [PetugasController::class, 'verified']);
    route::get('detail-print/{id}', [PetugasController::class, 'detailPrint']);
    route::get('logout', [AuthController::class, 'logout']);
});





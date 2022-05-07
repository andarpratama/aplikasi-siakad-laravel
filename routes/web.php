<?php

use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Admin\IdentitasController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TahunAjaranController;
use Illuminate\Support\Facades\Route;
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


Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['checkrole:superadmin'])->group(function () {
        Route::prefix('/')->group(function () {
            Route::get('/identitas-sekolah', [IdentitasController::class, 'index'])->name('identitas');
            Route::prefix('/kelas')->group(function () {
                Route::get('/', [KelasController::class, 'index'])->name('admin.kelas');
                Route::get('/tambah', [KelasController::class, 'create'])->name('admin.kelas.create');
            });

            Route::prefix('/ruangan')->group(function () {
                Route::get('/', [RuanganController::class, 'index'])->name('admin.ruangan');
                Route::get('/tambah', [RuanganController::class, 'create'])->name('admin.ruangan.create');
                Route::post('/simpan', [RuanganController::class, 'store'])->name('admin.ruangan.store');
                Route::get('/edit/{id}', [RuanganController::class, 'edit'])->name('admin.ruangan.edit');
                Route::post('/ubah/{id}', [RuanganController::class, 'update'])->name('admin.ruangan.update');
                Route::delete('/hapus/{id}', [RuanganController::class, 'delete'])->name('admin.ruangan.delete');
            });

            Route::get('/mapel', [MapelController::class, 'index'])->name('admin.mapel');
            Route::get('/tahun_ajaran', [TahunAjaranController::class, 'index'])->name('admin.tahun_ajaran');
            Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
            Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
            Route::get('/administrator', [AdministratorController::class, 'index'])->name('admin.administrator');
        });
    });
    Route::middleware(['checkrole:teacher,superadmin'])->group(function () {
        Route::prefix('teacher')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('teacher');
        });
    });

    Route::middleware(['checkrole:student'])->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('student');
        });
    });
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

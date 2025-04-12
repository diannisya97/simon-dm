<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataPasienController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\StokObatController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CatatanKesehatanController;
use App\Http\Controllers\User\DokterController;
use App\Http\Controllers\User\KontrolAktivitasController;
use App\Http\Controllers\User\PengingatObatController;
use App\Http\Controllers\User\PolaMakanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ReminderController;


Route::get('/', function () {
    return view('welcome.diabe');
});
Route::get('/simon-dm', function () {
    return view('welcome.greet');
})->name('greet');

//Admin Routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::post('/admin/verifikasi-user/update/{id}', [AdminController::class, 'updateUserRole'])->name('admin.verifikasi-user.update');
    Route::get('/data-pasien', [DataPasienController::class, 'index'])->name('admin.data-pasien');
    Route::get('/data-pasien/{id}', [DataPasienController::class, 'show'])->name('admin.detail');
    Route::get('/stok-obat', [StokObatController::class, 'index'])->name('admin.stok-obat');
    Route::post('/stok-obat/store', [StokObatController::class, 'store'])->name('admin.stok-obat.store');
    Route::put('/stok-obat/update/{stokObat}', [StokObatController::class, 'update'])->name('admin.stok-obat.update');
    Route::delete('/stok-obat/destroy/{stokObat}', [StokObatController::class, 'destroy'])->name('admin.stok-obat.destroy');
    Route::get('/admin/pasien', [PasienController::class, 'index'])->name('admin.pasien');
});

//user Routes
Route::middleware(['auth', 'verified', 'rolemanager:user'])->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::get('/riwayat', [CatatanKesehatanController::class, 'riwayat'])->name('riwayat');
    Route::delete('/riwayat/{id}', [CatatanKesehatanController::class, 'destroy'])->name('riwayat.destroy');
    Route::get('/kesehatan', [CatatanKesehatanController::class, 'kesehatan'])->name('kesehatan');
    Route::post('/kesehatan/simpan', [CatatanKesehatanController::class, 'store'])->name('kesehatan.simpan');
    Route::delete('/kesehatan/{id}', [CatatanKesehatanController::class, 'destroy'])->name('kesehatan.delete');
    Route::get('/pengingat', [PengingatObatController::class, 'index'])->name('pengingatObat');
    Route::post('/pengingat', [PengingatObatController::class, 'store'])->name('pengingat.store');
    Route::get('/pengingat-obat/update-status-sudah/{id}', [PengingatObatController::class, 'updateStatusSudah'])->name('update-status-sudah');
    Route::get('/pengingat-obat/update-status-terlewat/{id}', [PengingatObatController::class, 'updateStatusTerlewat'])->name('update-status-terlewat');
    Route::delete('/pengingat/{id}', [PengingatObatController::class, 'destroy'])->name('pengingat.destroy');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::get('/pola-makan', [PolaMakanController::class, 'index'])->name('pola.makan');
    Route::get('/aktivitas', [KontrolAktivitasController::class, 'index'])->name('kontrol.aktivitas');
    Route::post('/aktivitas/simpan', [KontrolAktivitasController::class, 'store'])->name('kontrol.aktivitas.simpan');
    Route::delete('/aktivitas/hapus/{id}', [KontrolAktivitasController::class, 'destroy'])->name('kontrol.aktivitas.hapus');
    Route::get('/reminders', [ReminderController::class, 'index'])->name('reminder');
    Route::post('/reminders', [ReminderController::class, 'store'])->name('reminder.store');
    Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminder.destroy');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.ubah');
    Route::put('/password', [UserController::class, 'updatePassword'])->name('password.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
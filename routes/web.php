<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\DashboardController;

// ----------------- Halaman splash screen -----------------
Route::get('/', function () {
    return view('user.splashscreen');
});

// ----------------- Landing page user -----------------
Route::get('/landing_page', [UserController::class, 'showFeaturedBikes'])
    ->name('user.landing_page');

// ----------------- Halaman sewa sepeda -----------------
Route::get('/sewa_sepeda', [SepedaController::class, 'index'])->name('user.sewa_sepeda');

// ----------------- Halaman tentang -----------------
Route::get('/tentang', fn () => view('user.tentang'))->name('user.tentang');

// ----------------- Halaman rating -----------------
Route::get('/rating', fn () => view('user.rating'))->name('user.rating');

// ----------------- Halaman profile -----------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('email.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/profile/report', [ProfileController::class, 'report'])->name('user.report');
});

// ----------------- Detail produk sepeda -----------------
Route::get('/detail_produk/{id}', [SepedaController::class, 'show'])->name('user.detail');

// ----------------- Halaman login -----------------
Route::get('/masuk', fn () => view('auth.masuk'))->name('auth.login');
Route::post('/masuk', [LoginController::class, 'login'])->name('auth.login.post');

// ----------------- Halaman beranda admin -----------------
Route::get('/admin/beranda_admin', [AdminController::class, 'index'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.beranda_admin');

// ----------------- Kelola sepeda -----------------
Route::get('/admin/kelola_sepeda', [AdminController::class, 'kelolaSepeda'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.kelola_sepeda');

// ----------------- Kelola pengguna -----------------
Route::get('/admin/pengguna_sepeda', [AdminController::class, 'kelolaPengguna'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.pengguna_sepeda');

// ----------------- User - daftar sepeda -----------------
Route::get('/penyewaan', [PenyewaanController::class, 'index'])
    ->name('penyewaan.index');

// ----------------- Kelola penyewaan -----------------
Route::get('/admin/penyewaan_sepeda', [PenyewaanController::class, 'kelolaPenyewaan'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.penyewaan_sepeda');

Route::get('/admin/penyewaan/export', [PenyewaanController::class, 'export'])
    ->name('admin.penyewaan_export')
    ->middleware(\App\Http\Middleware\AdminMiddleware::class);

// ----------------- Laporan -----------------
Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
Route::post('/admin/laporan/{id}/update-status', [LaporanController::class, 'updateStatus'])->name('admin.laporan.updateStatus');
Route::get('/laporan/export/pdf', [LaporanController::class, 'export'])->name('admin.laporan.export');

// ----------------- Form tambah sepeda -----------------
Route::get('/admin/tambah_sepeda', function () {
    return view('admin.tambah_sepeda');
})->name('admin.tambah_sepeda');

// ----------------- Proses simpan, edit, update, hapus sepeda -----------------
Route::post('/admin/tambah_sepeda', [SepedaController::class, 'store'])->name('admin.tambah_sepeda');
Route::get('/admin/sepeda/{id}/edit', [SepedaController::class, 'edit'])->name('admin.edit_sepeda');
Route::put('/admin/sepeda/{id}', [SepedaController::class, 'update'])->name('admin.update_sepeda');
Route::delete('/admin/sepeda/{id}', [SepedaController::class, 'destroy'])->name('admin.hapus_sepeda');

// ----------------- Halaman daftar -----------------
Route::get('/daftar', fn () => view('auth.daftar'))->name('register');
Route::post('/daftar', [AuthController::class, 'register'])->name('daftar.post');

// ----------------- Logout -----------------
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/landing_page');
})->name('logout');

// ----------------- Routes untuk user sewa -----------------
Route::get('/sewa', [SepedaController::class, 'index'])->name('user.sewa.index');
Route::get('/sewa/{id}', [SepedaController::class, 'sewaForm'])->name('user.sewa.form');
Route::post('/penyewaan/{id}', [PenyewaanController::class, 'store'])->name('penyewaan.store');
Route::post('/penyewaan/selesai/{id}', [PenyewaanController::class, 'selesai'])->name('penyewaan.selesai');
Route::delete('/penyewaan/batal/{id}', [PenyewaanController::class, 'batal'])->name('penyewaan.batal');
Route::get('/user/penyewaan', [UserController::class, 'getPenyewaan'])->name('user.penyewaan');

// ----------------- Halaman konfirmasi pemesanan -----------------
Route::get('/pemesanan', fn () => redirect()->route('user.landing_page'))->name('pemesanan.success');

// ----------------- Admin penyewaan Selesai/Batal -----------------
Route::post('/admin/penyewaan/{id}/selesai', [PenyewaanController::class, 'adminSelesai'])
    ->name('admin.akhiri_penyewaan')
    ->middleware(\App\Http\Middleware\AdminMiddleware::class);

Route::delete('/admin/penyewaan/{id}/batal', [PenyewaanController::class, 'adminBatal'])
    ->name('admin.batal_penyewaan')
    ->middleware(\App\Http\Middleware\AdminMiddleware::class);

// ----------------- Admin pengguna -----------------
Route::get('/admin/pengguna_sepeda', [PenggunaController::class, 'index'])->name('admin.pengguna_sepeda');

// ----------------- Ubah status pengguna -----------------
Route::post('/admin/pengguna/{id}/status', [PenggunaController::class, 'ubahStatus']);

// ----------------- Keranjang (versi 1 & 2) -----------------
Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('user.keranjang');
    Route::post('/keranjang', [KeranjangController::class, 'store'])->name('user.keranjang.store');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('user.keranjang.destroy');
});

// ----------------- Beranda admin dashboard -----------------
Route::get('/admin/beranda_admin', [DashboardController::class, 'index'])->name('admin.beranda_admin');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryShowController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SliderHomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes();
Route::get('/', function () {
    return redirect()->route('beranda');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login_process'])->name('login_process');
Route::post('/register', [RegisterController::class, 'register_process'])->name('register_process');

// Route::middleware(['auth'])->group(function () {
// });
Route::get('/beranda', [GalleryShowController::class, 'showAllPengguna'])->name('beranda');
Route::post('/like', [GalleryController::class, 'like']);


// Navbar 
    Route::view('/layanan', 'layanan'); 
    Route::get('/layanan', [AgendaController::class, 'showLayanan'])->name('layanan');
    // Route::view('/tentangKami', 'tentangKami');
    Route::get('/tentangKami', [GenericController::class, 'aboutUs'])->name('tentangKami');

    // Gallery 
    Route::post('/gallery/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');

    // Agenda 
    Route::get('/kegiatan/mendatang/{id}', [AgendaController::class, 'showMendatang'])->name('kegiatan.mendatang');
    Route::get('/kegiatan/lalu/{id}', [AgendaController::class, 'showLalu'])->name('kegiatan.lalu');


// Registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('/register', [RegisterController::class, 'register']); // Handle registration submission

// Additional routes
Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{id}', [CategoryController::class, 'cariMakananDariKategori'])->name('kategori.makanan');

//wisata
Route::get('/wisata', function () {
    return view('wisata.index');
});
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');

// Staff
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staffUpdate', [StaffController::class, 'edit'])->name('staff.edit');
Route::get('/staffDelete', [StaffController::class, 'delete'])->name('staff.delete');
Route::get('/staffAdd', [StaffController::class, 'add'])->name('staff.add');

//Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::post('/galeriAdd', [GalleryController::class, 'store'])->name('galeri.store'); // Handle  submission
Route::get('/galeriAdd', [GalleryController::class, 'create'])->name('galeri.add');
Route::get('/galeri/edit/{id}', [GalleryController::class, 'edit'])->name('galeri.edit');
Route::post('/galeri/edit/{id}', [GalleryController::class, 'update'])->name('galeri.update');
Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('galeri.destroy');
// Menu 
Route::get('/menu', [MenuController::class, 'menu'])->name('hidangan.menu');
//hidangan 
Route::get('/hidangan', [MenuController::class, 'index'])->name('hidangan.index');
Route::get('/hidangan/{id}', [MenuController::class, 'cariMenuDariId'])->name('hidangan.cari');
Route::get('/hidanganUpdate/{id}', [MenuController::class, 'edit'])->name('hidangan.edit');
Route::get('/hidanganAdd', [MenuController::class, 'add'])->name('hidangan.add');
Route::get('/hidanganDelete', [MenuController::class, 'delete'])->name('hidangan.delete');

//paket
Route::get('/paketUpdate', [PacketController::class, 'edit'])->name('paket.edit');
Route::get('/paketDelete', [PacketController::class, 'delete'])->name('paket.delete');
Route::get('/paketAdd', [PacketController::class, 'delete'])->name('paket.add');

//wisata
Route::get('/wisataStaff', [TravelController::class, 'staff'])->name('wisata.staff');
Route::get('/wisataUpdate', [TravelController::class, 'edit'])->name('wisata.edit');
Route::get('/wisataDelete', [TravelController::class, 'delete'])->name('wisata.delete');
Route::get('/wisataAdd', [TravelController::class, 'add'])->name('wisata.add');

//kegiatan
Route::get('/kegiatanUpdate', [AgendaController::class, 'edit'])->name('kegiatan.edit');
Route::get('/kegiatanDelete', [AgendaController::class, 'delete'])->name('kegiatan.delete');
Route::get('/kegiatanAdd', [AgendaController::class, 'add'])->name('kegiatan.add');
Route::get('/kegiatan', [AgendaController::class, 'index'])->name('kegiatan.index');
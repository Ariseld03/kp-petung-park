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

// wisata
Route::get('/wisata', function () {
    return view('wisata.index');
});
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');
Route::get('/wisata/add', [TravelController::class, 'add'])->name('wisata.add');
Route::post('/wisata', [TravelController::class, 'store'])->name('wisata.store');
Route::get('/wisata/edit/{wisata}', [TravelController::class, 'edit'])->name('wisata.edit');
Route::post('/wisata/edit/{wisata}', [TravelController::class, 'update'])->name('wisata.update');
Route::delete('/wisata/{wisata}', [TravelController::class, 'delete'])->name('wisata.delete');
Route::get('/wisata/staff', [TravelController::class, 'staff'])->name('wisata.staff');

// Staff
Route::get('/staf', [StaffController::class, 'index'])->name('staf.index');
Route::get('/staf/add', [StaffController::class, 'add'])->name('staf.add');
Route::post('/staf/add', [StaffController::class, 'store'])->name('staf.store');
Route::get('/staf/edit/{email}', [StaffController::class, 'edit'])->name('staf.edit');
Route::post('/staf/edit/{email}', [StaffController::class, 'update'])->name('staf.update');
Route::delete('/staf/{email}', [StaffController::class, 'delete'])->name('staf.delete');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::post('/galeri/add', [GalleryController::class, 'store'])->name('galeri.store');
Route::get('/galeri/add', [GalleryController::class, 'create'])->name('galeri.add');
Route::get('/galeri/edit/{gallery}', [GalleryController::class, 'edit'])->name('galeri.edit');
Route::post('/galeri/edit/{gallery}', [GalleryController::class, 'update'])->name('galeri.update');
Route::delete('/galeri/{gallery}', [GalleryController::class, 'destroy'])->name('galeri.destroy');

// Menu
Route::get('/menu', [MenuController::class, 'menu'])->name('hidangan.menu');

// Hidangan
Route::get('/hidangan', [MenuController::class, 'index'])->name('hidangan.index');
Route::get('/hidangan/add', [MenuController::class, 'add'])->name('hidangan.add');
Route::post('/hidangan', [MenuController::class, 'store'])->name('hidangan.store');
Route::get('/hidangan/edit/{hidangan}', [MenuController::class, 'edit'])->name('hidangan.edit');
Route::post('/hidangan/edit/{hidangan}', [MenuController::class, 'update'])->name('hidangan.update');
Route::delete('/hidangan/{hidangan}', [MenuController::class, 'delete'])->name('hidangan.delete');
Route::get('/hidangan/{id}', [MenuController::class, 'cariMenuDariId'])->name('hidangan.cari');

// Paket
Route::get('/paket/{id}', [PackageController::class, 'show'])->name('paket.show');
Route::post('/paket/{id}/like', [PackageController::class, 'addLike'])->name('paket.like');
Route::get('/paket/add', [PacketController::class, 'add'])->name('paket.add');
Route::post('/paket', [PacketController::class, 'store'])->name('paket.store');
Route::get('/paket/edit/{paket}', [PacketController::class, 'edit'])->name('paket.edit');
Route::post('/paket/edit/{paket}', [PacketController::class, 'update'])->name('paket.update');
Route::delete('/paket/{paket}', [PacketController::class, 'delete'])->name('paket.delete');

// Kegiatan
Route::get('/kegiatan', [AgendaController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/add', [AgendaController::class, 'add'])->name('kegiatan.add');
Route::post('/kegiatan', [AgendaController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/edit/{kegiatan}', [AgendaController::class, 'edit'])->name('kegiatan.edit');
Route::post('/kegiatan/edit/{kegiatan}', [AgendaController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{kegiatan}', [AgendaController::class, 'delete'])->name('kegiatan.delete');


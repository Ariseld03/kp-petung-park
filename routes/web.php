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
// Route::get('/login', [LoginController::class, 'login'])->name('login');

// Route::post('/login', [LoginController::class, 'login_process'])->name('login_process');
Route::post('/register', [RegisterController::class, 'register_process'])->name('register_process');

// Route::middleware(['auth'])->group(function () {
// });
Route::get('/beranda', [GalleryShowController::class, 'index'])->name('beranda');


// Navbar routes
    Route::view('/layanan', 'layanan'); 
    Route::get('/layanan', [AgendaController::class, 'showLayanan'])->name('layanan');
    Route::view('/tentangKami', 'tentangKami');

    // Gallery routes
    Route::post('/gallery/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');

    // Agenda routes
    Route::get('/kegiatan/mendatang/{id}', [AgendaController::class, 'showMendatang'])->name('kegiatan.mendatang');
    Route::get('/kegiatan/lalu/{id}', [AgendaController::class, 'showLalu'])->name('kegiatan.lalu');


// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('/register', [RegisterController::class, 'register']); // Handle registration submission

// Additional routes
Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/kategori/{id}', [CategoryController::class, 'cariMakananDariKategori'])->name('kategori.makanan');

Route::get('/hidangan', function () {
    return view('hidangan');
});
Route::get('/hidangan/{id}', [MenuController::class, 'cariMenuDariId'])->name('hidangan');

Route::get('/wisata', function () {
    return view('wisata');
});
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');

// Staff management views
Route::get('/staffShow', function () {
    return view('staffShow');
});
Route::get('/staffUpdate', function () {
    return view('staffUpdate');
});
Route::get('/staffDelete', function () {
    return view('staffDelete');
});
Route::get('/staffAdd', function () {
    return view('staffAdd');
});

// Gallery management views
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/galeriUpdate', function () {
    return view('galeriUpdate');
});
Route::get('/galeriDelete', function () {
    return view('galeriDelete');
});
Route::get('/galeriAdd', function () {
    return view('galeriAdd');
});

// Menu management views
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/hidanganUpdate', function () {
    return view('hidanganUpdate');
});

Route::get('/hidanganAdd', function () {
   return view('hidanganAdd');
});

Route::get('/hidanganDelete', function () {
    return view('hidanganDelete');
});

Route::get('/paketUpdate', function () {
    return view('paketUpdate');
});

Route::get('/paketDelete', function () {
    return view('paketDelete');
});

Route::get('/paketAdd', function () {
    return view('paketAdd');
});



Route::get('/wisataStaff', function () {
    return view('wisataStaff');
});

Route::get('/wisataUpdate', function () {
    return view('wisataUpdate');
});

Route::get('/wisataDelete', function () {
    return view('wisataDelete');
});

Route::get('/wisataAdd', function () {
    return view('wisataAdd');
});



Route::get('/kegiatan', function () {
    return view('kegiatan');
});

Route::get('/kegiatanUpdate', function () {
    return view('kegiatanUpdate');
});

Route::get('/kegiatanDelete', function () {
    return view('kegiatanDelete');
});

Route::get('/kegiatanAdd', function () {
    return view('kegiatanAdd');
});

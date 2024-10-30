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
Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']); // Untuk metode login

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('beranda');
    });
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']); // Untuk metode register


// Route::get('/', function () {
//     return redirect()->route('beranda');
//     // return view('register');
// });

Route::get('/register', function () {
    return view('register');
});
//buat navbar
Route::view('/beranda', 'beranda'); 
Route::view('/layanan', 'layanan'); 
Route::view('/tentangKami', 'tentangKami'); 

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

Route::get('/layanan', [AgendaController::class, 'showLayanan'])->name('layanan');

// Route untuk halaman detail wisata
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');

// Route::post('/gallery/{gallery}/like', [GalleryController::class, 'like'])->name('gallery.like');
Route::post('/gallery/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');

Route::get('/kegiatan/mendatang/{id}', [AgendaController::class, 'showMendatang'])->name('kegiatan.mendatang');
Route::get('/kegiatan/lalu/{id}', [AgendaController::class, 'showLalu'])->name('kegiatan.lalu');

// Route untuk menampilkan halaman beranda dengan galeri
Route::get('/beranda', [GalleryShowController::class, 'index'])->name('beranda');
Route::post('/gallery/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');
//Agenda 
// Route::resource('agendas', AgendaController::class);
// Route::post('agendas/json', [AgendaController::class, 'storeJson'])->name('agendas.store.json');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-------------------------------------------------------------------------
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


Route::get('/menu', function () {
    return view('menu');
});

Route::get('/hidanganUpdate', function () {
    return view('hidanganUpdate');
});

Route::get('/hidanganDelete', function () {
    return view('hidanganDelete');
});
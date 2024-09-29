<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\GalleryController;

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

Route::get('/', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/kategori', function () {
    return view('kategori');
});

/* Route untuk menampilkan halaman register
Route::get('/', function () {
    return view('auth.RegisterController');
})->name('register.form');*/


//Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::post('/gallery/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/tentangKami', function () {
    return view('tentangKami');
});

Route::get('/hidangan', function () {
    return view('hidangan');
});
Route::get('/wisata', function () {
    return view('wisata');
});

Route::get('/layanan', [AgendaController::class, 'showLayanan'])->name('layanan');



Route::get('/layanan', [AgendaController::class, 'showLayanan'])->name('layanan');

// Route untuk halaman detail wisata
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');



Route::post('/gallery/{gallery}/like', [GalleryController::class, 'like'])->name('gallery.like');

//Agenda 
Route::resource('agendas', AgendaController::class);
Route::post('agendas/json', [AgendaController::class, 'storeJson'])->name('agendas.store.json');


Route::get('/kegiatan/mendatang/{id}', [AgendaController::class, 'showMendatang'])->name('kegiatan.mendatang');
Route::get('/kegiatan/lalu/{id}', [AgendaController::class, 'showLalu'])->name('kegiatan.lalu');

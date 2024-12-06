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
use App\Http\Controllers\UserController;
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

//Autentikasi
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login_process'])->name('login_process');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'register_process'])->name('register_process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Navbar 
Route::get('/beranda', [GalleryShowController::class, 'showAllPengguna'])->name('beranda');
Route::get('/wisata', [PackageController::class, 'showLayanan'])->name('wisata');
Route::get('/agenda', [AgendaController::class, 'showAgenda'])->name('agenda');
Route::get('/tentangKami', [GenericController::class, 'aboutUs'])->name('tentangKami');

// Agenda 
Route::get('/kegiatan/mendatang/{id}', [AgendaController::class, 'showMendatang'])->name('kegiatan.mendatang');
Route::get('/kegiatan/lalu/{id}', [AgendaController::class, 'showLalu'])->name('kegiatan.lalu');

// wisata
Route::get('/wisata/{id}', [TravelController::class, 'show'])->name('wisata.show');
Route::post('/wisata/like/{galleryId}', [GalleryController::class, 'like'])->name('wisata.like');
// Admin CRUD Wisata
Route::get('/admin/wisata', [TravelController::class, 'index'])->name('wisata.index');
Route::get('/admin/wisata/add', [TravelController::class, 'add'])->name('wisata.add');
Route::post('/admin/wisata/add', [TravelController::class, 'store'])->name('wisata.store');
Route::get('/admin/wisata/edit/{wisata}', [TravelController::class, 'edit'])->name('wisata.edit');
Route::post('/admin/wisata/edit/{wisata}', [TravelController::class, 'update'])->name('wisata.update');
Route::delete('/admin/wisata/{wisata}', [TravelController::class, 'delete'])->name('wisata.delete');
Route::get('/admin/wisata/staff', [TravelController::class, 'staff'])->name('wisata.staff');

Route::get('/admin/wisata/galeri', [TravelController::class, 'indexTravelGallery'])->name('wisata.gallery.index');
Route::post('/admin/wisata/galeri/edit-form', [TravelController::class, 'editTravelGallery'])->name('wisata.gallery.edit');
Route::get('/admin/wisata/galeri/edit-form', [TravelController::class, 'editTravelGallery']);
Route::post('/admin/wisata/galeri/edit', [TravelController::class, 'updateTravelGallery'])->name('wisata.gallery.update');
Route::get('/admin/wisata/galeri/add', [TravelController::class, 'addTravelGallery'])->name('wisata.gallery.add');
Route::post('/admin/wisata/galeri/add', [TravelController::class, 'storeTravelGallery'])->name('wisata.gallery.store');
Route::post('/wisata/galeri/delete', [YourController::class, 'deleteTravelGallery'])->name('wisata.gallery.delete');

// Admin CRUD Staff
Route::get('/admin/staf', [UserController::class, 'index'])->name('staf.index');
Route::get('/admin/staf/add', [UserController::class, 'add'])->name('staf.add');
Route::post('/admin/staf/add', [UserController::class, 'store'])->name('staf.store');
Route::get('/admin/staf/edit/{user}', [UserController::class, 'edit'])->name('staf.edit');
Route::post('/admin/staf/edit/{user}', [UserController::class, 'update'])->name('staf.update');
Route::delete('/admin/staf/{user}', [UserController::class, 'destroy'])->name('staf.destroy');

// Galeri
Route::post('/galeri/{id}/like', [GalleryController::class, 'like'])->name('gallery.like');
// Admin CRUD Galeri
Route::get('/admin/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::post('/admin/galeri/add', [GalleryController::class, 'store'])->name('galeri.store');
Route::get('/admin/galeri/add', [GalleryController::class, 'add'])->name('galeri.add');
Route::get('/admin/galeri/edit/{gallery}', [GalleryController::class, 'edit'])->name('galeri.edit');
Route::post('/admin/galeri/edit/{gallery}', [GalleryController::class, 'update'])->name('galeri.update');
Route::delete('/admin/galeri/{gallery}', [GalleryController::class, 'delete'])->name('galeri.delete');

//Admin CRUD Galeri Show 
Route::get('/admin/galeri-show', [GalleryShowController::class, 'index'])->name('galeri.show.index');
Route::post('/admin/galeri-show/add', [GalleryShowController::class, 'store'])->name('galeri.show.store');
Route::get('/admin/galeri-show/add', [GalleryShowController::class, 'add'])->name('galeri.show.add');
Route::get('/admin/galeri-show/edit/{gallery}', [GalleryShowController::class, 'edit'])->name('galeri.show.edit');
Route::post('/admin/galeri-show/edit/{gallery}', [GalleryShowController::class, 'update'])->name('galeri.show.update');
Route::delete('/admin/galeri-show/{gallery}', [GalleryShowController::class, 'delete'])->name('galeri.show.delete');

//Admin CRUD Galeri Slider 
Route::get('/admin/galeri-slider', [SliderHomeController::class, 'index'])->name('galeri.slider.index');
Route::post('/admin/galeri-slider/add', [SliderHomeController::class, 'store'])->name('galeri.slider.store');
Route::get('/admin/galeri-slider/add', [SliderHomeController::class, 'add'])->name('galeri.slider.add');
Route::get('/admin/galeri-slider/edit/{gallery}', [SliderHomeController::class, 'edit'])->name('galeri.slider.edit');
Route::post('/admin/galeri-slider/edit/{gallery}', [SliderHomeController::class, 'update'])->name('galeri.slider.update');
Route::delete('/admin/galeri-slider/{gallery}', [SliderHomeController::class, 'delete'])->name('galeri.slider.delete');

// Hidangan
Route::get('/hidangan/{id}', [MenuController::class, 'cariMenuDariId'])->name('menu.hidangan.show');
Route::post('/hidangan/{menu}/like', [MenuController::class, 'like'])->name('menu.hidangan.like');
// Admin CRUD Hidangan
Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/admin/hidangan/add', [MenuController::class, 'add'])->name('menu.hidangan.add');
Route::post('/admin/hidangan/add', [MenuController::class, 'store'])->name('menu.hidangan.store');
Route::get('/admin/hidangan/edit/{hidangan}', [MenuController::class, 'edit'])->name('menu.hidangan.edit');
Route::post('/admin/hidangan/edit/{hidangan}', [MenuController::class, 'update'])->name('menu.hidangan.update');
Route::delete('/admin/hidangan/{hidangan}', [MenuController::class, 'delete'])->name('menu.hidangan.delete');

// Kategori
Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{id}', [CategoryController::class, 'cariMakananDariKategori'])->name('kategori.makanan');

// Paket
Route::get('/paket/{id}', [PackageController::class, 'show'])->name('menu.menu.paket.show');
Route::post('/paket/{id}/like', [PackageController::class, 'like'])->name('menu.paket.like');
// Admin CRUD Paket
Route::get('/admin/paket/add', [PackageController::class, 'add'])->name('menu.paket.add');
Route::post('/admin/paket/add', [PackageController::class, 'store'])->name('menu.paket.store');
Route::get('/admin/paket/edit/{package}', [PackageController::class, 'edit'])->name('menu.paket.edit');
Route::post('/admin/paket/edit/{package}', [PackageController::class, 'update'])->name('menu.paket.update');
Route::delete('/admin/paket/{package}', [PackageController::class, 'delete'])->name('menu.paket.delete');
//Paket Menu
Route::get('/admin/paket-menu', [PackageController::class, 'indexMenuPackage'])->name('menu.menupaket.index');
Route::get('/admin/paket-menu/add', [PackageController::class, 'addMenuPackage'])->name('menu.menupaket.add');
Route::post('/admin/paket-menu/add', [PackageController::class, 'storeMenuPackage'])->name('menu.menupaket.store');
Route::get('/admin/paket-menu/edit/{packagemenu}', [PackageController::class, 'editMenuPackage'])->name('menu.menupaket.edit');
Route::post('/admin/paket-menu/edit/{packagemenu}', [PackageController::class, 'updateMenuPackage'])->name('menu.menupaket.update');
Route::delete('/admin/paket-menu/{packagemenu}', [PackageController::class, 'deleteMenuPackage'])->name('menu.menupaket.delete');

// Kegiatan
// Admin CRUD Kegiatan
Route::get('/admin/kegiatan', [AgendaController::class, 'index'])->name('kegiatan.index');
Route::get('/admin/kegiatan/add', [AgendaController::class, 'add'])->name('kegiatan.add');
Route::post('/admin/kegiatan/add', [AgendaController::class, 'store'])->name('kegiatan.store');
Route::get('/admin/kegiatan/edit/{kegiatan}', [AgendaController::class, 'edit'])->name('kegiatan.edit');
Route::post('/admin/kegiatan/edit/{kegiatan}', [AgendaController::class, 'update'])->name('kegiatan.update');
Route::delete('/admin/kegiatan/{kegiatan}', [AgendaController::class, 'delete'])->name('kegiatan.delete');

// Admin CRUD Wisata
Route::get('/admin/artikel', [TravelController::class, 'index'])->name('artikel.index');
Route::get('/admin/artikel/add', [TravelController::class, 'add'])->name('artikel.add');
Route::post('/admin/artikel/add', [TravelController::class, 'store'])->name('artikel.store');
Route::get('/admin/artikel/edit/{artikel}', [TravelController::class, 'edit'])->name('artikel.edit');
Route::post('/admin/artikel/edit/{artikel}', [TravelController::class, 'update'])->name('artikel.update');
Route::delete('/admin/artikel/{artikel}', [TravelController::class, 'delete'])->name('artikel.destroy');
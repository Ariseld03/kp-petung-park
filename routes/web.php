<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AgendaController;

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

/* Route untuk menampilkan halaman register
Route::get('/', function () {
    return view('auth.RegisterController');
})->name('register.form');*/


//Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');


Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/tentangKami', function () {
    return view('tentangKami');
});

//Agenda 
Route::resource('agendas', AgendaController::class);
Route::post('agendas/json', [AgendaController::class, 'storeJson'])->name('agendas.store.json');

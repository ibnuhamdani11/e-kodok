<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\LembarKontrolController;
use App\Http\Controllers\PetugasController;


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
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('contents.pencarian');
// })->name('dashboard');

Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian'); 
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/lembar-kontrol', [LembarKontrolController::class, 'index'])->name('lembar-kontrol');
Route::post('/lembar-kontrol/add', [LembarKontrolController::class, 'store'])->name('lembar-kontrol-add');
Route::post('/lembar-kontrol/cari', [PencarianController::class, 'search'])->name('lembar-kontrol-cari');

Route::get('/petugas-verifikator', [PetugasController::class, 'verifikator'])->name('verifikator');
Route::get('/petugas-kasi-urji', [PetugasController::class, 'kasiUrji'])->name('kasi-urji');
Route::get('/petugas-pembayar', [PetugasController::class, 'pembayar'])->name('pembayar');
Route::post('/petugas/add', [PetugasController::class, 'store'])->name('petugas-add');
Route::delete('/petugas/delete/{id}', [PetugasController::class, 'delete'])->name('petugas-delete');

// Route::middleware(['web'])->group(function () {
//     Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
// });
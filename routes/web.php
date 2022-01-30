<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FcAdminController;
use App\Http\Controllers\FcController;
use App\Http\Controllers\FotocopyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PrintAdminController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Resource Router barang
Route::resource('barang', BarangController::class);

// Resource Router member
Route::resource('member', MemberController::class);

// Resource Router profile user
Route::resource('profile', ProfileController::class);

// Resource Router print admin
Route::resource('printadmin', PrintAdminController::class);

// Resource Router print
Route::resource('print', PrintController::class);

// Resource Router fotocopy user
Route::resource('fc', FcController::class);

// Resource Router fotocopy admin
Route::resource('fcadmin', FcAdminController::class);




// Dashboard user

Route::prefix('user')
    ->middleware('auth')
    ->group(function () {

        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });

// Dashboard admin

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

require __DIR__ . '/auth.php';

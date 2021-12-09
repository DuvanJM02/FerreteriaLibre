<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Models\Product;
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
    return view('index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('contact', function () {
    return view('contact');
})->name('contact');



Route::post('sendMail', [MailController::class, 'sendMail'])->name('sendMail');

Route::get('/dashboard-vendedor', function () {
    return view('dashboard-vendor');
})->name('dashboard-vendor');

Route::get('/registrar-vendedor', function () {
    return view('auth.register-vendor');
})->name('registrar-vendedor');

// Route::post('/registrar-vendedor', function () {
//     return view('auth.register-vendor');
// })->name('registrar-vendedor');

Route::get('/login-vendedor', function () {
    return view('auth.login-vendor');
})->name('login-vendedor');

Route::post('vendedor-store', [VendorController::class, 'store'])->name('vendor.store');
Route::post('vendedor-login', [VendorController::class, 'loginVendor'])->name('vendor.login');
Route::post('actualizar-status-user/{user}', [AdminController::class, 'updateStatus'])->name('actualizar-status-user');
Route::delete('eliminar-usuario/{user}', [AdminController::class, 'destroy'])->name('eliminar-usuario');
// PRODUCTOS
Route::post('registro-producto', [ProductController::class, 'store'])->name('registro-producto');
Route::get('editar-producto/{product}', [ProductController::class, 'edit'])->name('editar-producto');
Route::get('ver-producto/{product}', [ProductController::class, 'show'])->name('ver-producto');
Route::post('actualizar-producto/{product}', [ProductController::class, 'update'])->name('actualizar-producto');
Route::post('actualizar-status-producto/{product}', [AdminController::class, 'updateStatusProduct'])->name('actualizar-status-producto');
Route::post('buscar/{user}', [ProductController::class, 'search'])->name('buscar');
Route::post('buscar-producto', [ProductController::class, 'searchProduct'])->name('buscar-producto');
Route::delete('eliminar-producto/{product}', [ProductController::class, 'destroy'])->name('eliminar-producto');

// Route::post('productos', [TiendaController::class, 'store'])->name('productos.store');
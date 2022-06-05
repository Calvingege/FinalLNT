<?php

// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FakturController;
use App\Http\Middleware\IsAdmin;

require __DIR__.'/auth.php';

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/view', function() {
    return view('view');
})->middleware(['auth'])->name('view');

// Ranah admin 
Route::get(
    '/create/inventory',
    [InventoryController::class, 'CreateInventory']
)->middleware(['IsAdmin'])->name('CreateInventory');

Route::post(
    '/store/inventory',
    [InventoryController::class, 'StoreInventory']
)->middleware(['IsAdmin'])->name('StoreInventory');

Route::get(
    'show/inventory',
    [InventoryController::class, 'ShowInventory']
)->middleware(['IsAdmin'])->name('ShowInventory');

Route::get(
    'show/inventory/{id}',
    [InventoryController::class, 'ShowInventoryById']
)->middleware(['IsAdmin'])->name('ShowInventoryById');

Route::get(
    'update/inventory/{id}',
    [InventoryController::class, 'formUpdateInventory']
)->middleware(['IsAdmin'])->name('formUpdateInventory');

Route::patch(
    'updating/inventory/{id}',
    [InventoryController::class, 'UpdateInventory']
)->middleware(['IsAdmin'])->name('UpdateInventory');

Route::delete(
    'delete/inventory/{id}',
    [InventoryController::class, 'DeleteInventory']
)->middleware(['IsAdmin'])->name('DeleteInventory');

// untuk ranah user: 

Route::get(
    '/create/inventory',
    [InventoryController::class, 'CreateInventory']
)->name('CreateInventory');

Route::post(
    '/store/inventory',
    [InventoryController::class, 'StoreInventory']
)->name('StoreInventory');

Route::get(
    'show/inventory',
    [InventoryController::class, 'ShowInventory']
)->name('ShowInventory');

Route::get(
    'show/inventory/{id}',
    [InventoryController::class, 'ShowInventoryById']
)->name('ShowInventoryById');

Route::get(
    'update/inventory/{id}',
    [InventoryController::class, 'formUpdateInventory']
)->name('formUpdateInventory');

Route::patch(
    'updating/inventory/{id}',
    [InventoryController::class, 'UpdateInventory']
)->name('UpdateInventory');

Route::delete(
    'delete/inventory/{id}',
    [InventoryController::class, 'DeleteInventory']
)->name('DeleteInventory');

// ranah faktur bisa diakses oleh user

Route::get(
    'create/faktur',
    [FakturController::class, 'CreateFaktur']
)->name('CreateFaktur');

Route::post(
    'store/faktur',
    [FakturController::class, 'StoreFaktur']
)->name('StoreFaktur');

Route::get(
    'update/faktur/{id}',
    [FakturController::class, 'formUpdateFaktur']
)->name('formUpdateFaktur');

Route::get(
    'show/faktur',
    [FakturController::class, 'ShowFaktur']
)->name('ShowFaktur');

Route::delete(
    'delete/faktur/{id}',
    [FakturController::class, 'DeleteFaktur']
)->name('DeleteFaktur');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

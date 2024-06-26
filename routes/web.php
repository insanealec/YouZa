<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
  return Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
})->name('welcome');


Route::resources([
  'cars' => CarController::class,
  'manufacturers' => ManufacturerController::class,
]);
Route::post('/manufacturers/{manufacturer}/cars', [ManufacturerController::class, 'storeCar'])->name('manufacturers.storeCar');
Route::delete('/manufacturers/{manufacturer}/cars', [ManufacturerController::class, 'removeCar'])->name('manufacturers.removeCar');
Route::post('/cars/{car}/manufacturer', [CarController::class, 'associateManufacturer'])->name('cars.associateManufacturer');
Route::delete('/cars/{car}/manufacturer', [CarController::class, 'dissociateManufacturer'])->name('cars.dissociateManufacturer');

Route::prefix('menu')->controller(MenuController::class)->middleware(['auth', 'verified'])->group(function () {
  Route::get('/', 'index')->name('menu');
  Route::get('/category/{id}', 'category')->name('category');
  Route::get('/item/{id}', 'item')->name('item');
});

Route::prefix('admin')->controller(AdminController::class)->middleware(['auth', 'admin'])->group(function () {
  Route::get('/', 'index')->name('admin');

  Route::prefix('edit')->group(function () {
    Route::get('/menu/{id?}', 'showMenu')->name('admin.show.menu');
    Route::post('/menu', 'editMenu')->name('admin.edit.menu');

    Route::get('/category/{id?}', 'showCategory')->name('admin.show.category');
    Route::post('/category', 'editCategory')->name('admin.edit.category');

    Route::get('/item/{id?}', 'showItem')->name('admin.show.item');
    Route::post('/item', 'editItem')->name('admin.edit.item');
  });
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

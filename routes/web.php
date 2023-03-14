<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\StoresController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/employees', [EmployeesController::class, 'index'])->name('viewEmployees');
Route::post('/employees/employeeCreated', [EmployeesController::class, 'store']);
Route::get('/employees/form', [EmployeesController::class, 'create'])->name('createEmployees');
Route::patch('/employees/{updatedid}/updateProfile', [EmployeesController::class, 'update'])->name('updateProfile');
Route::get('/employees/{id}/edit', [EmployeesController::class, 'show'])->name('showEditEmployee');

Route::get('/stores', [StoresController::class, 'index'])->name('viewStores');
Route::get('/stores/form', [StoresController::class, 'create'])->name('createStores');
Route::patch('/stores/{id}/update', [StoresController::class, 'update'])->name('updateStore');
Route::get('/stores/{id}/edit', [StoresController::class, 'show'])->name('showEditStores');
Route::post('/stores/storeCreated', [StoresController::class, 'store'])->name('postStore');


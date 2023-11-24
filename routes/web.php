<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [UserController::class, 'index'])->name('user.home');
Route::get('/mytrip', [UserController::class, 'mytripDetails'])->name('user.mytrip');
Route::post('/addtrip',[UserController::class, 'addtrip'])->name('addtrip');
Route::put('/storetrip',[UserController::class, 'storetrip'])->name('storetrip');

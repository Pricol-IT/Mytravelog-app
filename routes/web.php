<?php


use Illuminate\Support\Facades\Route;

include base_path('routes/admin.php');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Approver\ApproverController;
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
Route::middleware('auth:user', 'verified')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
});
Auth::routes();
Route::controller(UserController::class)->prefix('user')->middleware('requester')->group(function () { 
    Route::get('/dashboard', 'index')->name('user.home');
    Route::get('/mytrip', 'mytripDetails')->name('user.mytrip');
    Route::get('/viewsummary/{id}', 'viewsummary')->name('user.summary');
    Route::post('/addtrip','addtrip')->name('addtrip');
    Route::put('/storetrip','storetrip')->name('storetrip');
    Route::get('/all_notifications', 'allNotification')->name('user.allnotify');
    Route::post('/clarification','clarification')->name('user.clarification');
    Route::get('/draft/{id}', 'draft')->name('user.draft');
    Route::put('/storedraft','storedraft')->name('storedraft');
    Route::get('/mysavedtrip', 'mysavedtrip')->name('user.mysavedtrip');

});

Route::controller(ApproverController::class)->prefix('approver')->middleware('approver')->group(function () { 

    Route::get('/dashboard', 'index')->name('approver.home');
    Route::get('/mytrip', 'mytripDetails')->name('approver.mytrip');
    Route::get('/viewsummary/{id}','viewsummary')->name('approver.summary');
    Route::post('/addtrip','addtrip')->name('approver.addtrip');
    Route::put('/storetrip','storetrip')->name('approver.storetrip');
    Route::get('/alltrip', 'OthersDetails')->name('approver.alltrip');
    Route::get('/pendingtrip', 'pendingDetails')->name('approver.pendingtrip');
    Route::get('/approvedtrip', 'approvalDetails')->name('approver.approvedtrip');
    Route::get('/rejectedtrip', 'rejectDetails')->name('approver.rejecttrip');
    Route::get('/clarificationtrip', 'clarificationDetails')->name('approver.clarificationtrip');
    Route::get('/tripApproved/{id}','tripApproved')->name('approver.approve');
    Route::get('/tripReject/{id}','tripReject')->name('approver.reject');
    Route::post('/remarks','remarks')->name('approver.remarks');
    Route::post('/clarification','clarification')->name('approver.clarification');

});
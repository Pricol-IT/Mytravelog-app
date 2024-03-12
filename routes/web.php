<?php


use App\Http\Controllers\Travels\TravelsController;
use Illuminate\Support\Facades\Route;

include base_path('routes/admin.php');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Approver\ApproverController;
use App\Http\Controllers\Accountant\AccountantController;
use App\Http\Controllers\User\ExpenseController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [HomeController::class, 'dashboard'])->name('home');

Route::middleware('auth:user', 'verified')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
});

Auth::routes();


Route::prefix('user')->middleware('requester')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('user.home');
        Route::get('/mytrip', 'mytripDetails')->name('user.mytrip');
        Route::get('/viewsummary/{id}', 'viewsummary')->name('user.summary');
        Route::post('/addtrip', 'addtrip')->name('addtrip');
        Route::put('/storetrip', 'storetrip')->name('storetrip');
        Route::get('/all_notifications', 'allNotification')->name('user.allnotify');
        Route::post('/clarification', 'clarification')->name('user.clarification');
        Route::get('/draft/{id}', 'draft')->name('user.draft');
        Route::put('/storedraft/{id}', 'storedraft')->name('user.storedraft');
        Route::get('/mysavedtrip', 'mysavedtrip')->name('user.mysavedtrip');
    });

    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/expense/mytrip', 'mytripexpenses')->name('user.mytripexpenses');
        Route::get('/expense/viewsummary/{id}', 'viewexpensesummary')->name('user.expensesummary');
        Route::get('/expense/addexpense', 'addexpense')->name('addexpense');
        Route::put('/expense/storetrip', 'storeexpense')->name('storeexpense');
    });
});



Route::controller(ApproverController::class)->prefix('approver')->middleware('approver')->group(function () {

    Route::get('/dashboard', 'index')->name('approver.home');
    Route::get('/mytrip', 'mytripDetails')->name('approver.mytrip');
    Route::get('/viewsummary/{id}', 'viewsummary')->name('approver.summary');
    Route::post('/addtrip', 'addtrip')->name('approver.addtrip');
    Route::put('/storetrip', 'storetrip')->name('approver.storetrip');
    Route::get('/alltrip', 'OthersDetails')->name('approver.alltrip');
    Route::get('/pendingtrip', 'pendingDetails')->name('approver.pendingtrip');
    Route::get('/approvedtrip', 'approvalDetails')->name('approver.approvedtrip');
    Route::get('/rejectedtrip', 'rejectDetails')->name('approver.rejecttrip');
    Route::get('/clarificationtrip', 'clarificationDetails')->name('approver.clarificationtrip');
    Route::get('/tripApproved/{id}', 'tripApproved')->name('approver.approve');
    Route::get('/tripReject/{id}', 'tripReject')->name('approver.reject');
    Route::post('/remarks', 'remarks')->name('approver.remarks');
    Route::post('/clarification', 'clarification')->name('approver.clarification');
    Route::get('/draft/{id}', 'draft')->name('approver.draft');
    Route::put('/storedraft/{id}', 'storedraft')->name('approver.storedraft');
    Route::get('/mysavedtrip', 'mysavedtrip')->name('approver.mysavedtrip');
    Route::post('/tripStatus', 'tripStatus')->name('approver.tripStatus');

});

Route::controller(AccountantController::class)->prefix('accountant')->middleware('accountant')->group(function () {

    Route::get('/dashboard', 'index')->name('accountant.home');
    Route::get('/allrequests', 'allrequests')->name('accountant.allrequests');
    Route::get('/notprocessed', 'notprocessed')->name('accountant.notprocessed');
    Route::get('/inprogress', 'inprogress')->name('accountant.inprogress');
    Route::get('/completed', 'completed')->name('accountant.completed');
    Route::get('/viewsummary/{id}', 'viewsummary')->name('accountant.summary');
    Route::get('/startproceed/{id}', 'startproceed')->name('accountant.startproceed');

    Route::get('/expenses/allrequests', 'expenses_allrequests')->name('accountant.expenses_allrequests');
    Route::get('/expenses/notprocessed', 'expenses_notprocessed')->name('accountant.expenses_notprocessed');
    Route::get('/expenses/inprogress', 'expenses_inprogress')->name('accountant.expenses_inprogress');
    Route::get('/expenses/completed', 'expenses_completed')->name('accountant.expenses_completed');
    Route::get('/expenses/viewsummary/{id}', 'expenses_viewsummary')->name('accountant.expenses_summary');
});

Route::controller(TravelsController::class)->prefix('travels')->middleware('travels')->group(function () {

    Route::get('/dashboard', 'index')->name('travels.home');
    Route::get('/allrequests', 'allrequests')->name('travels.allrequests');
    Route::get('/notprocessed', 'notprocessed')->name('travels.notprocessed');
    Route::get('/inprogress', 'inprogress')->name('travels.inprogress');
    Route::get('/completed', 'completed')->name('travels.completed');
    Route::get('/viewsummary/{id}', 'viewsummary')->name('travels.summary');
});

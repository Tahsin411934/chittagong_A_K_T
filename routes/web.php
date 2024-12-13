<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\TransectionProfileController;
use App\Http\Controllers\GenerateReceiptController;
use App\Http\Controllers\TransectionHistoryController;
use App\Http\Controllers\BenifitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
     if (Auth::user()->Role === "User") {
        return view('dashboard');
     } else {
        return view('Admin.deshboard');
     }
    
    
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// Route to display the form
Route::get('/users/set-role', [UserController::class, 'setRoleCreate'])->name('users.role.create');
Route::put('/users/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

// Display Reset Password Form
Route::get('/users/reset-password', [UserController::class, 'resetPasswordCreate'])->name('users.resetPassword.create');
Route::put('/users/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');


Route::resource('member', MemberController::class);

Route::put('/memberInfo/update', [MemberController::class, 'updateMember'])->name('user.memberInfo.updateMember');


Route::resource('transection_profiles', TransectionProfileController::class);
Route::get('/transection_profiles/create/{type}', [TransectionProfileController::class, 'create'])->name('user.nominees.create');
Route::get('/memberInfo', [MemberController::class, 'memberInfo'])->name('user.memberInfo.showMemberInfo');
Route::get('/generate-receipt/create', [GenerateReceiptController::class, 'create'])->name('generateReceipt.create');


Route::get('/nominees/create', [NomineeController::class, 'create'])->name('user.nominees.create');
Route::post('/nominees', [NomineeController::class, 'store'])->name('nominees.store');

Route::get('/transaction-history', [TransectionHistoryController::class, 'index'])->name('transaction-history.create');
Route::get('/transaction/find', [TransectionHistoryController::class, 'findByMemberId'])->name('transaction.findByMemberId');
Route::get('/monthly-report', [TransectionHistoryController::class, 'monthlyReport'])->name('transaction.monthlyReport');
Route::get('/view_transaction', [TransectionHistoryController::class, 'create'])->name('transaction.create');
Route::get('/edit_transaction', [TransectionHistoryController::class, 'updateCreate'])->name('transaction.edit');
Route::put('/edit_transaction', [TransectionHistoryController::class, 'update'])->name('transaction.update');

// benifit routes
Route::get('/add_bank_account',[BenifitController::class, 'create']);
Route::post('/add_bank_account',[BenifitController::class, 'store'])->name('bank.store');

Route::get('/add_interest', [BenifitController::class, 'createAddInterest']);
Route::post('/add_bank_interest',[BenifitController::class, 'storeInterest'])->name('bank.transaction.store');

Route::get('/deduction_interest', [BenifitController::class, 'createDeductionInterest']);
Route::post('/add_bank_interest',[BenifitController::class, 'storeInterest'])->name('bank.transaction.store');

require __DIR__.'/auth.php';

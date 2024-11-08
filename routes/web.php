<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\TransectionProfileController;
use Illuminate\Support\Facades\Route;

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


Route::resource('member', MemberController::class);
Route::resource('transection_profiles', TransectionProfileController::class);
Route::get('/transection_profiles/create/{type}', [TransectionProfileController::class, 'create'])->name('user.nominees.create');

Route::get('/nominees/create', [NomineeController::class, 'create'])->name('user.nominees.create');
Route::post('/nominees', [NomineeController::class, 'store'])->name('nominees.store');

require __DIR__.'/auth.php';

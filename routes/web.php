<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnhappyController;
use App\Http\Controllers\HappyController;
use App\Http\Controllers\EmailSendController;
use App\Models\Happy;
use App\Models\Unhappy;
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


Route::get('/happy', function () {
    $happy = Happy::latest()->get(); // Fetch all orders (latest first)
    // dd($happy);
    return view('dashboard', compact('happy'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/unhappy', function () {
    $unhappy = Unhappy::latest()->get(); // Fetch all orders (latest first)
    // dd($unhappy);
    return view('unhappy', compact('unhappy'));
})->middleware(['auth', 'verified'])->name('unhappy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin_email', [EmailSendController::class, 'index']);
Route::post('/email', [EmailSendController::class, 'storeOrUpdate'])->name('email.storeOrUpdate');
Route::post('/save-happy-form', [HappyController::class, 'store'])->name('save.form');
Route::post('/save-unhappy-form', [UnhappyController::class, 'store'])->name('save.unhappyform');
Route::get('/success', function () {
    return view('success');
});

Route::post('/update-following', [UnhappyController::class, 'updateFollowing'])->name('update-following');
Route::post('/update-following-happy', [HappyController::class, 'updateFollowing'])->name('update-following-happy');

require __DIR__.'/auth.php';

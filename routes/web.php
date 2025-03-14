<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnhappyController;
use App\Http\Controllers\HappyController;
use App\Models\Happy;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    $happy = Happy::latest()->get(); // Fetch all orders (latest first)
    // dd($orders);
    return view('dashboard', compact('happy'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::post('/save-happy-form', [HappyController::class, 'store'])->name('save.form');
Route::post('/save-unhappy-form', [UnhappyController::class, 'store'])->name('save.unhappyform');
Route::get('/success', function () {
    return view('success');
});
require __DIR__.'/auth.php';

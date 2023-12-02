<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Annonce;
use App\Models\Image;
use App\Http\Controllers\AnnonceController;

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



Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','verified'])->group(function () {

    Route::put('/userannonce', [AnnonceController::class, 'update'])->name('annonces.update');
    Route::delete('/userannonce', [AnnonceController::class, 'delete'])->name('annonces.delete');
    Route::post('/userannonce', [AnnonceController::class, 'store'])->name('annonces.store');

});


Route::get('/annonce/{id}', [AnnonceController::class, 'show']);




Route::get('/', function () {
    $annonces = \App\Models\Annonce::with('images', 'user')->get();
    return view('welcome', compact('annonces'));
})->name('welcome');



Route::get('/dashboard', function () {

    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/userannonce', function () {

    $userannonces = \App\Models\Annonce::with('images')->where('user_id', auth()->id())->get();

    return view('userannonce', compact('userannonces'));
})->middleware(['auth', 'verified'])->name('userannonce');

Route::get('/userfavoris', function () {

    return view('userfavoris');

})->middleware(['auth', 'verified'])->name('userfavoris');
Route::get('/addannonce', function () {

    return view('addannonce');

})->middleware(['auth', 'verified'])->name('addannonce');



require __DIR__.'/auth.php';

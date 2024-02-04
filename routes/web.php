<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\FavorisComponent;
use App\Models\User;
use http\Client\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Annonce;
use App\Models\Image;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\WelcomeController;

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
Route::get('email/verify',function (){
   return view('auth.verify-email');
})->middleware('auth')->name('verification-notice');

Route::get('/email/verify/{id}/{hash}',function (EmailVerificationRequest $request){
    $request->fulfill();
    return redirect('/profile');

})->middleware(['auth','signed'])->name('verification.verify');
Route::post('/email/verification-notification',function (\Illuminate\Http\Request $request){
    $request->user()->sendEmailVerifiationNotification();
    return back()->with('message','Verification link sent!');

})->middleware(['auth','throttle:6.1'])->name('verification.send');

Route::get('/annonce={id}', [AnnonceController::class, 'show']);


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');



Route::get('/annonceadded', function () {

    return view('annonceadded');

})->middleware(['auth', 'verified'])->name('annonceadded');

Route::get('/userannonce', function () {

    $userannonces = Annonce::with('images')->where('user_id', auth()->id())->paginate(30);

    return view('userannonce', compact('userannonces'));
})->middleware(['auth', 'verified'])->name('userannonce');

Route::get('/userfavoris', [FavorisController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('userfavoris');

Route::get('/addannonce', [AnnonceController::class, 'form'])->middleware(['auth', 'verified'])->name('addannonce');

Route::post('/ajouter_annnoce', [AnnonceController::class, 'ajouterProduit']);
Route::get('/images={filename}', [AnnonceController::class, 'showImg'])->name('image.show');




Route::post('/addFavoris', [FavorisComponent::class,'toggleFavori'])
    ->middleware(['auth', 'verified'])
    ->name('addfavoris');




require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetitionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->user_type === 'PETITIONER') {
        return view('dashboard', ['user' => $user]);
    } elseif ($user->user_type === 'OFFICER') {
        return view('admin_dashboard', ['user' => $user]);
    }

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/petitions', [PetitionController::class, 'index'])->name('petitions.index');
    Route::get('/petitions/create', [PetitionController::class, 'create'])->name('petitions.create');
    Route::post('/petitions', [PetitionController::class, 'store'])->name('petitions.store');
    Route::get('/petitions/{petition}', [PetitionController::class, 'show'])->name('petitions.show');
    Route::post('/petitions/{petition}/sign', [PetitionController::class, 'sign'])->name('petitions.sign');
    Route::post('/petitions/{petition}/response', [PetitionController::class, 'response'])->name('petitions.response');

    Route::get('/threshold', [PetitionController::class, 'threshold'])->name('petitions.threshold');
    Route::post('/threshold', [PetitionController::class, 'thresholdSubmit'])->name('petitions.threshold-submit');

});

// API Endpoints
Route::get('/slpp/petitions', [PetitionController::class, 'apiPetitions'])->name('api.petitions.index');

require __DIR__.'/auth.php';

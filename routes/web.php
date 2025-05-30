<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;

// Pagine pubbliche
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cosa-fare-a-roma', [PageController::class, 'cosaFare'])->name('cosaFare');
Route::get('/contatti', [PageController::class, 'contatti'])->name('contatti');
Route::get('/prenota', [PageController::class, 'prenota'])->name('prenota');
Route::view('/termini-e-condizioni', 'termini')->name('termini');

// rotte per le camere
Route::get('/camere', [PageController::class, 'camere'])->name('camere.index');
Route::get('/camere/pink-room', [PageController::class, 'pink'])->name('camere.pink');
Route::get('/camere/green-room', [PageController::class, 'green'])->name('camere.green');
Route::get('/camere/gray-room', [PageController::class, 'grey'])->name('camere.grey');

// rotte per la parte amministrativa
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/prenotazioni', [AdminController::class, 'prenotazioni'])->name('prenotazioni');
});

// Rotte per la prenotazione
Route::get('/prenota', [BookingController::class, 'create'])->name('booking.create');
Route::post('/prenota', [BookingController::class, 'store'])->name('booking.store');

Route::get('/api/booked-dates/{room}', [\App\Http\Controllers\BookingController::class, 'getBookedDates']);

// rotte mail
Route::post('/prenota', [BookingController::class, 'store'])->name('booking.store');
Route::post('/prenota', [BookingController::class, 'store'])->name('booking.store');
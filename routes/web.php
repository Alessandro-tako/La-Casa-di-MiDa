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
Route::get('/srtuttura', [PageController::class, 'bio'])->name('bio');
Route::view('/termini-e-condizioni', 'termini')->name('termini');

// Rotte per le camere
Route::get('/camere', [PageController::class, 'camere'])->name('camere.index');
Route::get('/camere/pink-room', [PageController::class, 'pink'])->name('camere.pink');
Route::get('/camere/green-room', [PageController::class, 'green'])->name('camere.green');
Route::get('/camere/gray-room', [PageController::class, 'grey'])->name('camere.grey');

// Rotte per l'amministrazione (protette da auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/prenotazioni', [AdminController::class, 'prenotazioni'])->name('prenotazioni');
    Route::post('/prenotazioni/{booking}/conferma', [AdminController::class, 'conferma'])->name('prenotazioni.conferma');
    Route::post('/prenotazioni/{booking}/annulla', [AdminController::class, 'annulla'])->name('prenotazioni.annulla');
    Route::patch('/prenotazioni/{prenotazione}', [AdminController::class, 'updatePrenotazione'])->name('prenotazioni.update');
    Route::get('/prenotazioni/{prenotazione}/modifica', [AdminController::class, 'edit'])->name('prenotazioni.edit');
    Route::put('/prenotazioni/{prenotazione}', [AdminController::class, 'update'])->name('prenotazioni.updateDate');
});

// Rotte per la prenotazione da parte degli utenti
Route::get('/prenota', [BookingController::class, 'create'])->name('booking.create');
Route::post('/prenota', [BookingController::class, 'store'])->name('booking.store');

// API per ottenere le date già prenotate
Route::get('/api/booked-dates/{room}', [BookingController::class, 'getBookedDates']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Pagine pubbliche
Route::get('/', [PageController::class, 'home'])->name('home');

// rotte per le camere
Route::get('/camere', [PageController::class, 'camere'])->name('camere.index');
Route::get('/camere/pink-room', [PageController::class, 'pink'])->name('camere.pink');
Route::get('/camere/green-room', [PageController::class, 'green'])->name('camere.green');
Route::get('/camere/gray-room', [PageController::class, 'grey'])->name('camere.grey');

Route::get('/cosa-fare-a-roma', [PageController::class, 'cosaFare'])->name('cosaFare');
Route::get('/contatti', [PageController::class, 'contatti'])->name('contatti');
Route::get('/prenota', [PageController::class, 'prenota'])->name('prenota');
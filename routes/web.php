<?php
use App\Http\Controllers\ChripController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChripController::class, 'index'])->name('home');

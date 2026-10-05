<?php
use App\Http\Controllers\ChripController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\Register;
use \App\Http\Controllers\Auth\Logout;
use \App\Http\Controllers\Auth\Login;


Route::get('/', [ChripController::class, 'index'])->name('home');
Route::middleware('auth')->group(function() {
    Route::resource('/chirps', ChripController::class)
    ->only(['store', 'edit', 'update', 'destroy']);
// Route::post('/chirps', [ChripController::class, 'store'])->name('chirps.store');
// Route::get('/chirps/{chirp}/edit', [ChripController::class, 'edit'])->name('chirps.edit');
// Route::put('/chirps/{chirp}', [ChripController::class, 'update'])->name('chirps.update');
// Route::delete('/chirps/{chirp}', [ChripController::class, 'destroy'])->name('chirps.destroy');

} );



//Register route
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', Register::class)->middleware('guest');

//Logout
Route::post('/logout', Logout::class)->middleware('auth')->name('logout');

Route::view('/login', 'auth.login')->middleware('guest')->name('login');

Route::post('/login', Login::class)->name('login')
->middleware('guest')->name('login');


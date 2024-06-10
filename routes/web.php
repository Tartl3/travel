<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelokoController;

Route::get('/', function () {
    return view('home');
});

Route::post('/travels', [TravelokoController::class, 'createTravel']);

Route::get('/tambah', function () {
    return view('tambah');
});

Route::get('/beli', function () {
    return view('beli');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/info/{kode_perjalanan}', [TravelokoController::class, 'show'])->name('travel.show');



Route::get('/home', function () {
    return view('home');
});

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/admin', [TravelokoController::class, 'showTravels']);
Route::post('/search', [TravelokoController::class, 'search'])->name('search');
Route::post('/booking', [TravelokoController::class, 'store'])->name('booking.store');





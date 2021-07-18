<?php

use App\Http\Controllers\ContacController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contact', [ContacController::class, 'index'])->name('contact');
Route::post('/contact', [ContacController::class, 'submit']);
// Route::post('/contact/submit', [ContacController::class, 'submit'])->name('contact-submit');

Route::get('/', function () {
    return view('home.index');
})->name('home');

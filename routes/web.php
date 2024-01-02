<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::name('pages.')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
});

Route::name('links.')->group(function () {
    Route::get('/{hash}', [LinkController::class, 'redirectToDestination'])->name('redirect_to_destination');
    Route::post('/links/post', [LinkController::class, 'post'])->name('post');
});

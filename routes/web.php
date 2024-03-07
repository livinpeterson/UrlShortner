<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\ShortLinkController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shortlink',[ShortLinkController::class,'index'])->name('shortlink.get');
Route::post('/shortlink/store',[ShortLinkController::class,'store'])->name('shortlink.post');
Route::get('/{code}',[ShortLinkController::class,'shortenlink'])->name('shorten.link');
Route::get('/shortlink/{id}/edit', [ShortLinkController::class, 'edit'])->name('shortlink.edit');
Route::put('/shortlink/{id}/update', [ShortLinkController::class, 'update'])->name('shortlink.update');
Route::delete('/shortlink/{shortlink}/delete', [ShortLinkController::class, 'destroy'])->name('shortlink.destroy');

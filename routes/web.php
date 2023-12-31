<?php

use App\Http\Controllers\PdfGeneratorController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('chart', function () {
    return view('chart');
});

Route::get('tabs', function () {
    return view('tab');
});

Route::get('chart2', function () {
    return view('chart2');
});

Route::get('chart3', function () {
    return view('chart3');
});

Route::get('button', function () {
    return view('buttonchart');
});
// Route::resource('products', ProductController::class, 'index');

Route::get('posts', [PostController::class, 'index']);

Route::get('html-pdf', [PdfGeneratorController::class, 'index'])->name('index');
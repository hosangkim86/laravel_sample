<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "About Page!!!";
});

Route::get('/item/{id}', function ($id) {
    $message = "商品IDは{$id}";
    return $message;
});

//Amazonの商品のようなルーティング
Route::get('/dp/{id}', function ($id) {
    $message = "商品IDは{$id}";
    return $message;
});

// URLから直接アクセスできない
Route::post('/hello', function () {
    $message = "こんにちは";
    return $message;
});

//Google検索みたいなルーティング
Route::get('/search', function (Request $request) {
    //dd($request);
    $keyword = $request->q;
    $message = "キーワードは{$keyword}です";
    return $message;
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

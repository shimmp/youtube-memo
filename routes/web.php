<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YoutubeapiController;
use App\Http\Controllers\MemoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/search',function(){
    return view('memo.search');
})->name('search');
Route::get('/youtube/search', [YoutubeapiController::class, 'search']);

Route::get('/meme',[MemoController::class,'meme']);

Route::get('/memos',[MemoController::class,'index'])->name('index');//メモ一覧表示
Route::get('/memos/create',[MemoController::class,'create']);//メモ作成画面へ
Route::post('/memos',[MemoController::class,'store']);//メモ作成保存用
Route::get('/memos/{memo}/edit',[MemoController::class,'edit']);//メモ詳細の表示
Route::put('/memos/{memo}',[MemoController::class,'update']);//メモ編集


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;

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

// テスト用のルート
Route::get('tests/test',[TestController::class,'index']);

// リソースコントローラー(今回は使用しない)
// Route::resource('contacts',ContactFormController::class);

// グループ化等を使用したルーティング
Route::prefix('contacts') // URLの頭に'contacts''文をつける
    ->middleware(['auth']) // まとめて認証を走らせる
    ->controller(ContactFormController::class) // 共通して使用するコントローラーを使用
    ->name('contacts.') // ルート名に名前をつける
    ->group(function(){ // グループ化
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/','store')->name('store');
        Route::get('/{id}','show')->name('show');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::post('/{id}','update')->name('update');
        Route::post('/{id}/destroy','destroy')->name('destroy');
    });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryAgentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderGoodController;
use App\Http\Controllers\GoodController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test_session', function() {
    session()->put('test_key', '123');
    return session()->all();
});

Route::get('/order_good/{order_id}', [OrderGoodController::class, 'index'])
    ->name('order_good.index');
Route::post('/order_good', [OrderGoodController::class, 'store'])
    ->name('order_good.store');
Route::put('/order_good/{order_good}', [OrderGoodController::class, 'update'])
    ->name('order_good.update');
Route::delete('/order_good/{order_good}', [OrderGoodController::class, 'destroy'])
    ->name('order_good.destroy');

Route::get('/order', [OrderController::class, 'index'])
    ->name('order.index');
Route::get('/order/{order}', [OrderController::class, 'show'])
    ->name('order.show');
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store');
Route::put('/order/{order}', [OrderController::class, 'update'])
    ->name('order.update');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])
    ->name('order.destroy');

Route::get('/good', [GoodController::class, 'index'])
    ->name('good.index');
Route::get('/good/{good_}', [GoodController::class, 'show'])
    ->name('good.show');
Route::post('/good', [GoodController::class, 'store'])
    ->name('good.store');
Route::put('/good/{good}', [GoodController::class, 'update'])
    ->name('good.update');
Route::delete('/good/{good}', [GoodController::class, 'destroy'])
    ->name('good.destroy');

Route::resource('agent', DeliveryAgentController::class); # Можно так...
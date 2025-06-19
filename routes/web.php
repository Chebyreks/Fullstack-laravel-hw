<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryAgentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderGoodController;
use App\Http\Controllers\GoodController;

Route::get('/get-csrf-token', function() {
    return response()->json([
        'csrf_token' => csrf_token()
    ]);
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/main', function () {
    return view('admin_main');
})->name('admin.main');

Route::get('/admin/good', [GoodController::class, 'index'])
    ->name('admin.good.index');
Route::get('/admin/good/create', [GoodController::class, 'create'])
    ->name('admin.good.create');
Route::post('/admin/good', [GoodController::class, 'store'])
    ->name('admin.good.store');
Route::put('/admin/good/{good}', [GoodController::class, 'update'])
    ->name('admin.good.update');
Route::delete('/admin/good/{good}', [GoodController::class, 'destroy'])
    ->name('admin.good.destroy');

Route::get('/admin/agent', [DeliveryAgentController::class, 'index'])
    ->name('admin.agent.index');
Route::get('/admin/agent/create', [DeliveryAgentController::class, 'create'])
    ->name('admin.agent.create');
Route::post('/admin/agent', [DeliveryAgentController::class, 'store'])
    ->name('admin.agent.store');
Route::put('/admin/agent/{good}', [DeliveryAgentController::class, 'update'])
    ->name('admin.agent.update');
Route::delete('/admin/agent/{good}', [DeliveryAgentController::class, 'destroy'])
    ->name('admin.agent.destroy');

Route::get('/user/main', function () {
    return view('user_main');
})->name('user.main');

Route::get('/user/order', [OrderController::class, 'index'])
    ->name('user.order.index');
Route::get('/user/order/create', [OrderController::class, 'create'])
    ->name('user.order.create');
Route::post('/user/order', [OrderController::class, 'store'])
    ->name('user.order.store');
Route::put('/user/order/{order}', [OrderController::class, 'update'])
    ->name('user.order.update');
Route::delete('/user/order/{order}', [OrderController::class, 'destroy'])
    ->name('user.order.destroy');

Route::get('/user/order_good/{order}', [OrderGoodController::class, 'index'])
    ->name('user.order_good.index');
Route::post('/user/order_good', [OrderGoodController::class, 'store'])
    ->name('user.order_good.store');
Route::put('/order_good/{order_good}', [OrderGoodController::class, 'update'])
    ->name('order_good.update');
Route::delete('/order_good/{order_good}', [OrderGoodController::class, 'destroy'])
    ->name('order_good.destroy');




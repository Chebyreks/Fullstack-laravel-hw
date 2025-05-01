<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::all();
        return view('pages.order.index', compact('orders'));
    }

    public function show(int $order_id)
    {  
        $order = Order::where('id', $order_id);
        return view('pages.order_good.index', compact('order'));
    }

    public function store(OrderCreateRequest $request) 
    {
        $data = $request->validated();
        $order = Order::create($data);
        return redirect(route('order_good.index', $order->id));
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $order->fill($data);
        $order->saveOrFail();

        return redirect(route('order_good.index', $order->id));
    }

    public function destroy(Order $order)
    {
        $order->deleteOrFail();

        return redirect(route('order.index'));
    }
}

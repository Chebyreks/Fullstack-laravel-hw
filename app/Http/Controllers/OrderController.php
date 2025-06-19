<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Good;
use App\Models\DeliveryAgent;
class OrderController extends Controller
{
    public function create() 
    {
        $agents = DeliveryAgent::select('id', 'name')->where('active', true)->orderBy('name')->get();
        return view('pages.user.order.create', compact('agents'));
    }

    public function index() 
    {
        $orders = Order::all();
        return view('pages.user.order.index', compact('orders'));
    }

    public function show(int $order_id)
    {  
        $order = Order::where('id', $order_id);
        return view('pages.user.order_good.index', compact('order'));
    }

    public function store(OrderCreateRequest $request) 
    {
        $data = $request->validate([
            'delivery_agent_id' => 'required|exists:delivery_agents,id'
        ]);
        $validatedData = [
            'user_id' => '0',
            'sum_price' => '0',
            'delivery_agent_id' => $data['delivery_agent_id']
        ];
        $order = Order::create($validatedData);

        return redirect(route('user.order_good.index', $order));
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $order->fill($data);
        $order->saveOrFail();

        return redirect(route('user.order_good.index', $order));
    }

    public function destroy(Order $order)
    {
        $order->deleteOrFail();

        return redirect(route('user.order.index'));
    }
}

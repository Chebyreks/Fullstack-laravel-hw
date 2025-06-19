<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAgent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\OrderGoodCreateRequest;
use App\Http\Requests\OrderGoodUpdateRequest;
use App\Models\Order_good;
use App\Models\Good;
use App\Models\Order;

class OrderGoodController extends Controller
{
    public function index(int $order_id)
    {
        $order_goods = Order_good::where('order_id', $order_id);
        $order = Order::findOrFail($order_id);
        $agent = DeliveryAgent::find($order->delivery_agent_id);
        $goods = Good::all();
        return view('pages.user.order_good.index', compact('goods', 'order_id', 'agent'));
    }

    public function store(OrderGoodCreateRequest $request)
    {
        $data = $request->validated();
        $price = $data["price"];
        $order_good = Order_good::create($data);
        Order::where('id', $data['order_id'])
            ->increment('sum_price', $price);
        return redirect(route('user.order_good.index', $order_good->order_id));
    }

    public function update(OrderGoodUpdateRequest $request, Order_good $order_good)
    {
        $data = $request->validated();

        $order_good->fill($data);
        $order_good->saveOrFail();

        return redirect(route('user.order_good.index', $order_good->order_id));
    }

    public function destroy(Order_good $order_good)
    {
        $order_good->deleteOrFail();

        return redirect(route('user.order_good.index', $order_good->order_id));
    }
}

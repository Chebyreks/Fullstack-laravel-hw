<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\OrderGoodCreateRequest;
use App\Http\Requests\OrderGoodUpdateRequest;
use App\Models\Order_good;

class OrderGoodController extends Controller
{
    public function index(int $order_id)
    {
        $order_goods = Order_good::where('order_id', $order_id);

        return view('pages.order_good.index', compact('order_goods'));
    }

    public function store(OrderGoodCreateRequest $request)
    {
        $data = $request->validated();

        $order_good = Order_good::create($data);

        return redirect(route('order_good.index', $order_good->order_id));
    }

    public function update(OrderGoodUpdateRequest $request, Order_good $order_good)
    {
        $data = $request->validated();

        $order_good->fill($data);
        $order_good->saveOrFail();

        return redirect(route('order_good.index', $order_good->order_id));
    }

    public function destroy(Order_good $order_good)
    {
        $order_good->deleteOrFail();

        return redirect(route('order_good.index', $order_good->order_id));
    }
}

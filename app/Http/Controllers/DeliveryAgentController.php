<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeliveryAgentCreateRequest;
use App\Http\Requests\DeliveryAgentUpdateRequest;
use App\Models\Delivery_agent;
use App\Models\Order;
class DeliveryAgentController extends Controller
{
    public function index() 
    {
        $agents = Delivery_agent::all();
        return view('pages.agent.index', compact('agents'));
    }

    public function show(Delivery_agent $agent_id)
    {  
        $orders = Order::where('delivery_agent_id', $agent_id->id);
        return view('pages.agent.show', compact('orders'));
    }

    public function store(DeliveryAgentCreateRequest $request) 
    {
        $data = $request->validated();
        $agent = Delivery_agent::create($data);
        return redirect(route('agent.index'));
    }

    public function update(DeliveryAgentUpdateRequest $request, Delivery_agent $agent)
    {
        $data = $request->validated();
        $agent->fill($data);
        $agent->saveOrFail();
        return redirect(route('agent.show', $agent));
    }

    public function destroy(Delivery_agent $agent)
    {
        $agent->deleteOrFail();
        return redirect(route('agent.index'));
    }
}

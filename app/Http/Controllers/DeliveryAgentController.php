<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeliveryAgentCreateRequest;
use App\Http\Requests\DeliveryAgentUpdateRequest;
use App\Models\DeliveryAgent;
use App\Models\Order;
class DeliveryAgentController extends Controller
{
    public function create()
    {
        return view('pages.admin.agent.create');
    }
    public function index() 
    {
        $agents = DeliveryAgent::all();
        return view('pages.admin.agent.index', compact('agents'));
    }

    public function store(DeliveryAgentCreateRequest $request) 
    {
        $data = $request->validate([
            'name' => 'required|string',
            'active' => 'required|in:0,1'
        ]);

        $agent = DeliveryAgent::create($data);
        return redirect(route('admin.agent.index'));
    }

    public function update(DeliveryAgentUpdateRequest $request, DeliveryAgent $agent)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'active' => 'required|in:0,1'
        ]);

        $agent->fill($data);
        $agent->saveOrFail();
        return redirect(route('admin.agent.index'));
    }

    public function destroy(DeliveryAgent $agent)
    {
        $agent->deleteOrFail();
        return redirect(route('admin.agent.index'));
    }
}

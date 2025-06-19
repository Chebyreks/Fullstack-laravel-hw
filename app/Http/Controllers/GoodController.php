<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GoodCreateRequest;
use App\Http\Requests\GoodUpdateRequest;
use App\Models\Good;
class GoodController extends Controller
{
    public function create()
    {
        return view('pages.admin.good.create');
    }
    public function index() 
    {
        $goods = Good::all();
        return view('pages.admin.good.index', compact('goods'));
    }

    public function show(Good $good_)
    {  
        $good = Good::where('id', $good_->id);
        return view('pages.admin.good.show', compact('good'));
    }

    public function store(GoodCreateRequest $request) 
    {
        $data = $request->validated();
        $good = Good::create($data);
        return redirect(route('admin.good.index'));
    }

    public function update(GoodUpdateRequest $request, Good $good)
    {
        $data = $request->validated();
        $good->fill($data);
        $good->saveOrFail();
        return redirect(route('admin.good.index'));
    }

    public function destroy(Good $good)
    {
        $good->deleteOrFail();
        return redirect(route('admin.good.index'));
    }
}

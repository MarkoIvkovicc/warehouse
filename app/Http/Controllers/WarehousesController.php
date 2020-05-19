<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouses;
use App\Warehouse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $warehouse = Warehouse::query();

        if(!empty($request->request->all())) {
            if (!empty($request->search)) {
                $warehouse = $warehouse->where('name', 'LIKE', '%' . $request->search . '%');

                $warehouse = $warehouse->when(isset($request->sort), function ($query) use ($request) {
                    return $request->sort == 'asc' ?
                        $query->orderBy($request->column) :
                        ( $request->sort == 'desc') ?
                            $query->orderByDesc($request->column) : '';
                });
            }
            if(isset($request->product) || isset($request->stock) || isset($request->city)){
                $warehouse = !empty($warehouse) ? $warehouse->filter($request) : Warehouse::filter($request);
            }
        }

        $warehouse = $warehouse->paginate(Config::get('app.paginate'));

        $columnNames = ['name', 'address', 'city', 'phone'];

        $oldValues = $request->all();

        return view('warehouses.index', compact(['warehouse', 'columnNames', 'oldValues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWarehouses $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreWarehouses $request)
    {
        $data = $request->only('name', 'address', 'city', 'phone');

        Warehouse::create($data);

        return redirect('/warehouses')->with('success', 'Warehouse Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param Warehouse $warehouse
     * @return Factory|View
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Warehouse $warehouse
     * @return Factory|View
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreWarehouses $request
     * @param Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreWarehouses $request, Warehouse $warehouse)
    {
        $data = $request->only('name', 'address', 'city', 'number');

        $warehouse->update($data);

        return redirect('/warehouses')->with('success', 'Warehouse Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Warehouse $warehouse
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect('/warehouses')->with('success', 'Warehouse Successfully Deleted');
    }
}

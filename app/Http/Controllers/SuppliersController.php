<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuppliers;
use App\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $supplier = Supplier::query();

        if(!empty($request->request->all())) {
            if (!empty($request->search)) {
                $supplier = $supplier->where('name', 'LIKE', '%' . $request->search . '%');

                $supplier = $supplier->when(isset($request->sort), function ($query) use ($request) {
                    return $request->sort == 'asc' ?
                        $query->orderBy($request->column) :
                        ( $request->sort == 'desc') ?
                            $query->orderByDesc($request->column) : '';
                });
            }
            if(isset($request->city) || isset($request->phone)){
                $supplier = !empty($supplier) ? $supplier->filter($request) : Supplier::filter($request);
            }
        }

        $supplier = $supplier->paginate(Config::get('app.paginate'));

        $columnNames = ['name', 'address', 'city', 'phone'];

        $oldValues = $request->all();

        return view('suppliers.index', compact(['supplier', 'columnNames', 'oldValues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSuppliers $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreSuppliers $request)
    {
        $data = $request->only('name', 'address', 'city', 'phone');

        Supplier::create($data);

        return redirect('/suppliers')->with('success', 'Supplier Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Supplier  $supplier
     * @return Factory|View
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Supplier  $supplier
     * @return Factory|View
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreSuppliers $request
     * @param Supplier $supplier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreSuppliers $request, Supplier $supplier)
    {
        $supplier->update($request->only('name', 'address', 'city', 'phone'));

        return redirect('/suppliers')->with('success', 'Supplier Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supplier $supplier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect('/suppliers')->with('success', 'Suppliers Successfully Deleted');
    }
}

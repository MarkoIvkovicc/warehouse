<?php

namespace App\Http\Controllers;

use App\Arrival;
use App\Employee;
use App\Http\Requests\StoreArrivals;
use App\Product;
use App\Supplier;
use App\Warehouse;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class ArrivalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $arrival = Arrival::with('supplier', 'employee', 'product', 'warehouse');

        $search = $request->search;

        if (!empty($search)) {
            $arrival = $arrival->whereHas('product', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });

            $arrival = $arrival->when(isset($request->sort), function ($query) use ($request) {
                return $request->sort == 'asc' ?
                    $query->orderBy($request->column) :
                    ($request->sort == 'desc') ?
                        $query->orderByDesc($request->column) : '';
            });
        }

        $requestFields = $request->only('arrivalDateMax', 'arrivalDateMin', 'arrivalStockMax', 'arrivalStockMin',
            'expireDays', 'employee', 'product', 'supplier', 'warehouse');

        if (!empty($requestFields)) {
            $arrival = $arrival->filter($request);
        }

        $suppliers = Supplier::all('id', 'name');
        $employees = Employee::all('id', 'name');
        $products = Product::all('id', 'name');
        $warehouses = Warehouse::all('id', 'name');

        $arrival = $arrival->paginate(Config::get('app.paginate'));
        $columnNames = ['arrival_date', 'arrival_stock', 'expire_date'];

        $oldValues = $request->all();

        return view('arrivals.index',  compact(['arrival', 'suppliers', 'employees', 'products', 'warehouses' ,'columnNames', 'oldValues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $product = Product::all('id', 'name');
        $supplier = Supplier::all('id', 'name');
        $employee = Employee::all('id', 'name');
        $warehouse = Warehouse::all('id', 'name');

        $todayDate = date('Y') . '-' . date('m') . '-' . date('d');

        return view('arrivals.create', compact( 'product', 'supplier', 'employee', 'warehouse', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArrivals $request
     * @return RedirectResponse|Redirector
     */
    public function store(StoreArrivals $request)
    {
        $data = $request->only('arrival_date', 'arrival_stock', 'expire_date', 'supplier_id', 'employee_id', 'product_id', 'warehouse_id');

        Arrival::create($data);

        return redirect('/arrivals')->with('success', 'Item successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param Arrival $arrival
     * @return Factory|View
     */
    public function show(Arrival $arrival)
    {
        $arrival->load('supplier', 'employee', 'product', 'warehouse');

        return view('arrivals.show', compact('arrival'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Arrival $arrival
     * @return Factory|View
     */
    public function edit(Arrival $arrival)
    {
        $supplier = Supplier::where('id', '!=', $arrival->supplier_id)->get(['id', 'name']);
        $employee = Employee::where('id', '!=', $arrival->employee_id)->get(['id', 'name']);
        $product = Product::where('id', '!=', $arrival->product_id)->get(['id', 'name']);
        $warehouse = Warehouse::where('id', '!=', $arrival->warehouse_id)->get(['id', 'name']);

        return view('arrivals.edit', compact('arrival', 'supplier', 'employee', 'product', 'warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreArrivals $request
     * @param Arrival $arrival
     * @return RedirectResponse|Redirector
     */
    public function update(StoreArrivals $request, Arrival $arrival)
    {
        $arrival->update($request->only('arrival_date', 'arrival_stock', 'expire_date', 'supplier_id', 'employee_id', 'product_id', 'warehouse_id'));

        return redirect('/arrivals')->with('success', 'Arrival data has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Arrival $arrival
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Arrival $arrival)
    {
        $arrival->delete();

        return redirect('/arrivals')->with('success', 'Item successfully removed');
    }
}

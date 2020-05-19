<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreEmployees;
use App\Warehouse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $employee = Employee::query();

        if (!empty($request->request->all())) {
            if (!empty($request->search)) {
                $employee = $employee->where('name', 'LIKE', '%' . $request->search . '%');

                $employee = $employee->when(isset($request->sort), function ($query) use ($request) {
                    return $request->sort == 'asc' ?
                        $query->orderBy($request->column) :
                        ($request->sort == 'desc') ?
                            $query->orderByDesc($request->column) : '';
                });
            }
            if(isset($request->ageMin) || isset($request->ageMax) || isset($request->warehouse)){
                $employee = !empty($employee) ? $employee->filter($request) : Employee::filter($request);
            }
        }

        $employee = $employee->paginate(Config::get('app.paginate'));

        $warehouses = Warehouse::all('id', 'name');

        $columnNames = ['name', 'age', 'job_description'];

        $oldValues = $request->all();

        return view('employees.index', compact(['employee', 'warehouses', 'columnNames', 'oldValues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $warehouses = Warehouse::all('id', 'name');

        return view('employees.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployees $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreEmployees $request)
    {
        $data = $request->only('name', 'age', 'job_description', 'warehouse_id');

        Employee::create($data);

        return redirect('/employees')->with('success', 'Employee Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Factory|View
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Factory|View
     */
    public function edit(Employee $employee)
    {
        $warehouses = Warehouse::all('id', 'name');

        return view('employees.edit', compact('employee'), compact('warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreEmployees $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreEmployees $request, Employee $employee)
    {
        $data = $request->only('name', 'age', 'job_description', 'warehouse_id');

        $employee->update($data);

        return redirect('/employees')->with('success', 'Employee Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee Successfully Deleted');
    }
}

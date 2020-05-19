<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreEmployees;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
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

        $response = [
            'data' => [
                'employees' => $employee->paginate(Config::get('app.paginate')),
            ],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployees $request
     * @return JsonResponse
     */
    public function store(StoreEmployees $request)
    {
        $data = $request->only('name', 'age', 'job_description', 'warehouse_id');

        try {
            $createEmployee = Employee::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'employee' => $createEmployee,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function show(Employee $employee)
    {
        $employee->load('warehouse');

        $response = [
            'data' => [
                'employees' => $employee,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreEmployees $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(StoreEmployees $request, Employee $employee)
    {
        try {
            $employee->update($request->only('name', 'age', 'job_description', 'warehouse_id'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }
        $response = [
            'data' => [
                'employee' => $employee,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        } finally {
            $msg = 'Record successfully deleted.';
        }

        $response = [
            'data' => [
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * @return JsonResponse
     */
    public function getAll()
    {
        return response()->json(Employee::all());
    }
}

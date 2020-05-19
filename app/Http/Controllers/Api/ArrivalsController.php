<?php

namespace App\Http\Controllers\Api;

use App\Arrival;
use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreArrivals;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;

class ArrivalsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
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

        $response = [
            'data' => [
                'arrivals' => $arrival->paginate(Config::get('app.paginate')),
                ],
        ];

        return response()->json($response);
    }

    /**
     * @param StoreArrivals $request
     * @return JsonResponse
     */
    public function store(StoreArrivals $request)
    {
        $data = $request->only('arrival_date', 'arrival_stock', 'expire_date', 'supplier_id', 'employee_id', 'product_id', 'warehouse_id');

        try {
            $createArrival = Arrival::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'arrival' => $createArrival,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * @param Arrival $arrival
     * @return JsonResponse
     */
    public function show(Arrival $arrival)
    {
        $arrival->load('supplier', 'employee', 'product', 'warehouse');

        $response = [
            'data' => [
                'arrival' => $arrival,
            ],
        ];

        return response()->json($response);
    }

    /**
     * @param StoreArrivals $request
     * @param Arrival $arrival
     * @return JsonResponse
     */
    public function update(StoreArrivals $request, Arrival $arrival)
    {
        try {
            $arrival->update($request->only('arrival_date', 'arrival_stock', 'expire_date', 'supplier_id', 'employee_id', 'product_id', 'warehouse_id'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'arrival' => $arrival,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * @param Arrival $arrival
     * @return JsonResponse
     * @throws \Exception-
     */
    public function destroy(Arrival $arrival)
    {
        try {
            $arrival->delete();
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
        return response()->json(Arrival::all());
    }
}

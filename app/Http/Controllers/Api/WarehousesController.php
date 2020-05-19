<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreWarehouses;
use App\Warehouse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
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

        $response = [
            'data' => [
                'warehouses' => $warehouse->paginate(Config::get('app.paginate')),
            ],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWarehouses $request
     * @return JsonResponse
     */
    public function store(StoreWarehouses $request)
    {
        $data = $request->only('name', 'address', 'city', 'phone');

        try {
            $createWarehouse = Warehouse::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'warehouse' => $createWarehouse,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param Warehouse $warehouse
     * @return JsonResponse
     */
    public function show(Warehouse $warehouse)
    {
        $response = [
            'data' => [
                'warehouse' => $warehouse,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreWarehouses $request
     * @param Warehouse $warehouse
     * @return JsonResponse
     */
    public function update(StoreWarehouses $request, Warehouse $warehouse)
    {
        try {
            $warehouse->update($request->only('name', 'address', 'city', 'number'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'warehouse' => $warehouse,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Warehouse $warehouse
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Warehouse $warehouse)
    {
        try {
            $warehouse->delete();
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
        return response()->json(Warehouse::all());
    }

}

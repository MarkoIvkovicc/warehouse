<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreSuppliers;
use App\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Mockery\Exception;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
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

        $response = [
            'data' => [
                'suppliers' => $supplier->paginate(Config::get('app.paginate')),
            ],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSuppliers $request
     * @return JsonResponse
     */
    public function store(StoreSuppliers $request)
    {
        $data = $request->only('name', 'address', 'city', 'phone');

        try {
            $createSupplier = Supplier::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'supplier' => $createSupplier,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param Supplier $supplier
     * @return JsonResponse
     */
    public function show(Supplier $supplier)
    {
        $response = [
            'data' => [
                'supplier' => $supplier,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreSuppliers $request
     * @param Supplier $supplier
     * @return JsonResponse
     */
    public function update(StoreSuppliers $request, Supplier $supplier)
    {
        try {
            $supplier->update($request->only('name', 'address', 'city', 'phone'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }


        $response = [
            'data' => [
                'arrival' => $supplier,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supplier $supplier
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
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
        return response()->json(Supplier::all());
    }
}

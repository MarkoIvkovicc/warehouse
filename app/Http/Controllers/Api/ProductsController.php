<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreProducts;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $product = Product::with('category');

        if(!empty($request->all())) {
            if (!empty($request->search)) {
                $product = $product->where('name', 'LIKE', '%' . $request->search . '%');

                $product = $product->when(isset($request->sort), function ($query) use ($request) {
                    return $request->sort == 'asc' ?
                        $query->orderBy($request->column) :
                        ($request->sort == 'desc') ?
                            $query->orderByDesc($request->column) : '';
                });
            }
            if(isset($request->category) || isset($request->warehouse) || isset($request->stockMin) || isset($request->stockMax) || isset($request->priceMax) || isset($request->priceMin)){
                $product = !empty($product) ? $product->filter($request) : Product::filter($request);
            }
        }

        $response = [
            'data' => [
                'products' => $product->paginate(Config::get('app.paginate')),
            ],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProducts $request
     * @return JsonResponse
     */
    public function store(StoreProducts $request)
    {
        $data = $request->only('name', 'description', 'price', 'category_id');

        try {
            $createProduct = Product::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'product' => $createProduct,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        $product->load('category');

        $response = [
            'data' => [
                'product' => $product,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProducts $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(StoreProducts $request, Product $product)
    {
        try {
            $product->update($request->only('name', 'description', 'stock', 'price', 'category_id'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'product' => $product,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
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
        return response()->json(Product::all());
    }
}

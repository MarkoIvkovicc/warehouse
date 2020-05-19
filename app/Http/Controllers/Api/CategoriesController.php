<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Api\Controller as Controller;
use App\Http\Requests\StoreCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Mockery\Exception;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $category = Category::query();

        if (!empty($request->search)) {
            $category = $category->where('name', 'LIKE', '%' . $request->search . '%');

            $category = $category->when(isset($request->sort), function ($query) use ($request) {
                return $request->sort == 'asc' ?
                    $query->orderBy($request->column) :
                    ($request->sort == 'desc') ?
                        $query->orderByDesc($request->column) : '';
            });
        }

        $response = [
            'data' => [
                'categories' => $category->paginate(Config::get('app.paginate')),
            ],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategories $request
     * @return JsonResponse
     */
    public function store(StoreCategories $request)
    {
        $data = $request->only('name', 'description');

        try {
            $createCategory = Category::create($data);
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'category' => $createCategory,
                'message' => 'Record successfully created!',
            ],
        ];

        return response()->json($response)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        $response = [
            'data' => [
                'category' => $category
            ]
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCategories $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(StoreCategories $request, Category $category)
    {
        try {
            $category->update($request->only('name', 'description'));
            $msg = 'Record successfully updated!';
        } catch (Exception $exception) {
            return response()->json($exception)->setStatusCode(500);
        }

        $response = [
            'data' => [
                'category' => $category,
                'message' => $msg,
            ],
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
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
        return response()->json(Category::all());
    }
}

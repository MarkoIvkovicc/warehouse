<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategories;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
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

        $category = $category->paginate(Config::get('app.paginate'));

        $columnNames = ['name', 'description'];

        $searchValue = $request->search;

        return view('categories.index', compact(['category', 'columnNames', 'searchValue']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * @param StoreCategories $request
     * @return RedirectResponse|Redirector
     */
    public function store(StoreCategories $request)
    {
        $data = $request->only('name', 'description');

        Category::create($data);

        return redirect('/categories')->with('success', 'Category Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCategories $request
     * @param Category $category
     * @return RedirectResponse|Redirector
     */
    public function update(StoreCategories $request, Category $category)
    {
        $category->update($request->only('name', 'description'));

        return redirect('/categories')->with('success', 'Category Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories')->with('success', 'Category Successfully Deleted');
    }
}

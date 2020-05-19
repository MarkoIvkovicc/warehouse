<?php

namespace App\Http\Controllers;

use App\Category;
use App\Warehouse;
use App\Product;
use App\Http\Requests\StoreProducts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
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

        $product = $product->paginate(Config::get('app.paginate'));

        $columnNames = ['name', 'description', 'stock', 'price'];
        
        $oldValues = $request->all();

        $warehouses = Warehouse::all('id', 'name');
        $categories = Category::all('id', 'name');

        return view('products.index', compact(['product', 'warehouses', 'categories', 'columnNames', 'oldValues']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $category = Category::all('id', 'name');

        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProducts $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProducts $request)
    {
        $data = $request->only('name', 'description', 'price', 'category_id');

        Product::create($data);

        return redirect('/products')->with('success', 'Product Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function show(Product $product)
    {
        $category = Category::find($product->category_id)->name;

        return view('products.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product)
    {
        $category = Category::where('id', '!=', $product->category_id)->get();

        return view('products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProducts $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProducts $request, Product $product)
    {
        $product->update($request->only('name', 'description', 'stock', 'price', 'category_id'));

        return redirect('/products')->with('success', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Product Successfully Deleted');
    }
}

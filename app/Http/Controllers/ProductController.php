<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Product::class, 'product', [
            'except' => 'show'
        ]);
    }

    public function index()
    {
        if(!auth()->user()->isAdmin) {
            $products = auth()->user()
                ->products()
                ->getResults();
        }
        else {
            $products = Product::all();
        }
        return view('models.product.index', ['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('models.product.form', compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        $product = auth()->user()->products()
            ->create($request->validatedWithImage());
        return redirect(route('product.index'));
    }


    public function show(Product $product)
    {
        return view('models.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('models.product.form', ['product' => $product, 'categories'=>$categories]);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validatedWithImage());
        return redirect()->route('product.index');
    }


    public function destroy(Product $product)
    {
        $product->deleteImage();
        $product->delete();
        return redirect(route('product.index'));
    }

    function removeImage(Product $product) {
        $this->authorize('update',$product);
        $product->deleteImage();
        $product->update([
            'img' => null
        ]);

        return back();
    }
}

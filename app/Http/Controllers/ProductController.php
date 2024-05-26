<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function detail(string $id): View
    {
        return view('product-detail', [
            'product' => Product::findOrFail($id)
        ])->with('message', 'Product detail retrieved');
    }

    /**
     * Display a listing of the resource.
     */
    public function show($limit = 10): View
    {
        return view('product', [
            'products' => Product::simplePaginate($limit)
        ])->with('message', 'List of products retrieved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name is too long',
            'description.required' => 'Description is required',
            'description.max' => 'Description is too long',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
        ]);

        $request->merge(['user_id' => auth()->id()]);

        Product::create($request->all());

        return redirect()->route('product.list')->with('message', 'Product created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('edit-product', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::findOrFail($id)->update($request->all());

        return redirect()->route('product.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Asset;
use Illuminate\Http\RedirectResponse;

class AssetController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function detail(string $id): View
    {
        return view('asset-detail', [
            'asset' => Asset::findOrFail($id)
        ])->with('message', 'Asset detail retrieved');
    }

    /**
     * Display a listing of the resource.
     */
    public function show($limit = 10): View
    {
        return view('welcome', [
            'assets' => Asset::simplePaginate($limit)
        ])->with('message', 'List of assets retrieved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create-asset');
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

        Asset::create($request->all());

        return redirect()->route('home')->with('message', 'Asset created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('edit-asset', ['asset' => Asset::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Asset::findOrFail($id)->update($request->all());

        return redirect()->route('home')->with('message', 'Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Asset::findOrFail($id)->delete();

        return redirect()->route('home')->with('message', 'Asset deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ], [
           'name.required' => 'Product Option name is required',
           'price.required' => 'Product Option price is required',
           'price.numeric' => 'Product Option price is have to be a number',
        ]);
        $option = new ProductOption();
        $option->name = $request->name;
        $option->price = $request->price;
        $option->product_id = $request->product_id;
        if ($option->save()){
            toastr()->success('Created Product Option Successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = ProductOption::findOrFail($id);
        $option->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }
}

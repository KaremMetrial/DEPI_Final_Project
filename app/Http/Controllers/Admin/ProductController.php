<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $imagePath =  $this->uploadImage($request,'thumb_image');

        $product = new Product();
        $product->fill($request->validated());
        $product->slug = Str::slug($request->name);
        if ($imagePath) {
            $product->thumb_image = $imagePath;
        }
        if ($product->save()){
            toastr()->success('Product Created Successfully');
        }
        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::FindOrFail($id);
        $categories = Category::select('id' , 'name')->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::find($id);

        $imagePath =  $this->uploadImage($request,'thumb_image',$product->thumb_image);

        $product->fill($request->validated());
        $product->slug = Str::slug($request->name);
        if ($imagePath) {
            $product->thumb_image = $imagePath;
        }
        if ($product->save()){
            toastr()->success('Product Updated Successfully');
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $product = Product::findOrFail($id);
            $imagePath = public_path($product->thumb_image);

            if (!empty($product->thumb_image) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $product->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Deleted Failed!']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Exception;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'image' => ['required', 'image'],
            'product_id' => ['required', 'integer']
        ]);
        $imagePath = $this->uploadImage($request, 'image');
        $gallery = new ProductGallery();
        $gallery->product_id = $request->product_id;
        $gallery->image = $imagePath;
        $gallery->save();
        toastr()->success('Uploaded Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $images = ProductGallery::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        return view('admin.product.gallery.index', compact('product', 'images'));
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
        try {
            $image = ProductGallery::findOrFail($id);

            $imagePath = public_path($image->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}

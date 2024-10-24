<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Exception;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request)
    {
//        uploadImage
        $imagePath = $this->uploadImage($request, 'image');
        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->input('offer');
        $slider->title = $request->input('title');
        $slider->sub_title = $request->input('sub_title');
        $slider->short_description = $request->input('short_description');
        $slider->button_link = $request->input('button_link');
        $slider->status = $request->input('status');
        $slider->save();
        toastr()->success('Created Successfully');
        return to_route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $slider->image);

        $slider->image = !empty($imagePath) ? $imagePath : $slider->image;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();
        if ($slider->wasChanged()) {
            toastr()->success('Slider Updated Successfully');
        }
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $slider = Slider::findOrFail($id);
            $imagePath = public_path($slider->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $slider->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Deleted Failed!']);
        }
    }

}

@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4> Edit Product</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview"
                             style="background-image: url({{ asset( $product->thumb_image) }}); background-size: cover; background-position: center center;">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumb_image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control"
                                  name="short_description">{{ old('name', $product->short_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>long Description</label>
                        <textarea class="form-control"
                                  name="long_description">{{ old('name', $product->long_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('name', $product->price) }}">
                    </div>
                    <div class="form-group">
                        <label>offer price</label>
                        <input type="text" class="form-control" name="offer_price"
                               value="{{ old('name', $product->offer_price) }}">
                    </div>
                    <div class="form-group">
                        <label>sku</label>
                        <input type="text" class="form-control" name="sku" value="{{ old('name', $product->sku) }}">
                    </div>
                    <div class="form-group">
                        <label>seo title</label>
                        <input type="text" class="form-control" name="seo_title"
                               value="{{ old('name', $product->seo_title) }}">
                    </div>
                    <div class="form-group">
                        <label>seo description</label>
                        <input type="text" class="form-control" name="seo_description"
                               value="{{ old('name', $product->seo_description) }}">
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Category</label>
                        <select name="categories_id" id="categories_id" class="form-control select2">
                            <option value="" disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option @selected(old('categories_id', $product->categories_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected(old('status', $product->status) == 1) value="1">Active</option>
                            <option @selected(old('status', $product->status) == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>show at home</label>
                        <select name="show_at_home" class="form-control">
                            <option @selected(old('show_at_home', $product->show_at_home) == 1) value="1">Yes</option>
                            <option @selected(old('show_at_home', $product->show_at_home) == 0) selected value="0">No
                            </option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>

            </div>
        </div>
    </section>
@stop

@push('admin-js')

    <!-- JS Libraies -->
    <script src="{{ asset('admin/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    {{--    <script src="{{ asset('admin/js/page/features-post-create.js') }}"></script>--}}
    <script>
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
    </script>


@endpush

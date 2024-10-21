@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4> Create New Product</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumb_image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control" name="short_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>long Description</label>
                        <textarea class="form-control" name="long_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label>offer price</label>
                        <input type="text" class="form-control" name="offer_price">
                    </div>
                    <div class="form-group">
                        <label>sku</label>
                        <input type="text" class="form-control" name="sku">
                    </div>
                    <div class="form-group">
                        <label>seo title</label>
                        <input type="text" class="form-control" name="seo_title">
                    </div>
                    <div class="form-group">
                        <label>seo description</label>
                        <input type="text" class="form-control" name="seo_description">
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Category</label>
                        <select name="categories_id" id="categories_id" class="form-control select2">
                            <option value="" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>show at home</label>
                        <select name="show_at_home" class="form-control">
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
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

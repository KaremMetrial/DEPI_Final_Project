@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4> Create New Slider</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" class="form-control" name="offer">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="sub_title">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control" name="short_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Button Link</label>
                        <input type="text" class="form-control" name="button_link">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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

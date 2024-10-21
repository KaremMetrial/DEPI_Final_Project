@extends('.admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update User Settings</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="form-group row mb-4">
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview" style="background-image: url({{ asset( Auth::user()->avatar) }}); background-size: cover; background-position: center center;">
                                        <label for="image-upload" id="image-label">Change File</label>
                                        <input type="file" name="avatar" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update.password') }}" method="post" >
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                            @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
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

    <script src="{{ asset('admin/js/page/features-post-create.js') }}"></script>
@endpush

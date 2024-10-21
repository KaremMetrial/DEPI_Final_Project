@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products Gallery ({{ $product->name }})</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary mb-3">Go back</a>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Products Gallery</h4>

            </div>
            <div class="card-body">
                <div class="col-ml-8">
                    <form action="{{ route('admin.product-gallery.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="image" id="" class="form-control">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($images as $image)
                            <tr>
                                <td>
                                    <img width="250px" src="{{ asset($image->image) }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('admin.product-gallery.destroy',$image->id) }}"
                                       class="btn btn-danger delete-item mx-2"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No Data Found!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
@push('admin-js')
    <script>
        $(document).ready(function () {
            $("body").on('click', '.delete-item', function (e) {
                e.preventDefault()
                let url = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "delete",
                            url: url,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                if (response.status === 'success') {
                                    // Swal.fire({
                                    //     title: "Deleted!",
                                    //     text: "Your file has been deleted.",
                                    //     icon: "success"
                                    // });
                                    // $('#slider-table').DataTable().draw();
                                    window.location.reload();
                                    toastr.success('Your data has been deleted successfully.')
                                }else{
                                    toastr.error('Your data deleted  failed .')
                                }
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        })

                    }
                });
            });
        });
    </script>

@endpush

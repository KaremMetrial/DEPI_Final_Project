@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products Variants ({{ $product->name }})</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary mb-3">Go back</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h4>Create Product Size</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-size.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-primary ">
                    <div class="card-header">

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sizes as $size)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $size->name }}
                                        </td>
                                        <td>
                                            {{ $size->price }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product-size.destroy', $size->id) }}"
                                               class="btn btn-danger delete-item mx-2"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h4>Create Product Option</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-option.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-primary ">
                    <div class="card-header">

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($options as $option)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $option->name }}
                                        </td>
                                        <td>
                                            {{ $option->price }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product-option.destroy', $option->id) }}"
                                               class="btn btn-danger delete-item mx-2"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                } else {
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

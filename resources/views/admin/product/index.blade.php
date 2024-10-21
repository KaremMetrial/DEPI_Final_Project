@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Products</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                        Create New
                    </a>

                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@stop

@push('admin-js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function () {
            $("body").on('click', '.delete_item', function (e) {
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

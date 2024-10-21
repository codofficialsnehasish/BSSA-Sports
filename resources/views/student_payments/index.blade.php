@extends('layouts.app')
@section('title', 'Student Payment List')


@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> 
@endsection



@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Student Payments</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.student.payment.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Make New Payments</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">

          

            <div class="card">

                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-wrap">Sl. No.</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Total Payment</th>
                                    <th>Total Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students->isNotEmpty())
                                    @foreach ($students as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->roll_no }}</td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->total_transaction_amount }}</td>
                                            <td>{{ $item->due_amount }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('admin.student.payment.show', $item->id) }}">Details</a>
                                                <a class="btn btn-info" href="{{ route('admin.student.payment.show-transactions', $item->id) }}">Transactions</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No transactions found.</td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add click event handler to delete buttons with class 'delete-brand'
            $('.delete-catgory').on('click', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                var actionText = "Catgory";

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you really want to delete this ' + actionText + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: deleteUrl,
                                type: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content') // Include CSRF token
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: response.success,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function(xhr) {

                                    var errorMsg = xhr.responseJSON?.error ||
                                        'There was an error deleting the ' +
                                        actionText + '';
                                    Swal.fire({
                                        title: 'Error!',
                                        text: errorMsg,
                                        icon: 'error',
                                    });
                                }
                            });
                        }
                    }
                });
            });



        });
    </script>

@endsection

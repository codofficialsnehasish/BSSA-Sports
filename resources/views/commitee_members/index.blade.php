@extends('layouts.app')
@section('title', 'Comity')


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
                        <li class="breadcrumb-item active" aria-current="page">{{ getCommitee($committe_id)->name }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <!--end breadcrumb-->
        <div class="row g-3">
            <div class="col-auto">
                <div class="position-relative">
                    <input class="form-control px-5" type="search" placeholder="Search Committees">
                    <span
                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">

                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <a href="{{ route('admin.committe.members.create', $committe_id) }}"><button class="btn btn-primary px-4"><i
                                class="bi bi-plus-lg me-2"></i>Assign Members</button></a>
                </div>

            </div>
        </div><!--end row-->

        <div class="row">



            <div class="card mt-4">

            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Name</th>
                                    <th>Visibility</th>
                                    <th>Designations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($commitee_members->isNotEmpty())
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($commitee_members as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->member->full_name }}</td>
                                            <td>
                                                {!! getStatus($item->member->status) !!}
                                            </td>

                                            <td>
                                                @if ($item->designation)
                                                    <button type="button"
                                                        class="btn btn-outline-success">{{ $item->designation->name ?? 'Not Assigned' }}</button>
                                                @else
                                                    <button type="button" class="btn btn-outline-info">Not
                                                        Assigned</button>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('admin.members.edit', $item->id) }}">
                                                    <i class="text-primary" data-feather="edit"></i></a>


                                                <a class="delete-comity"
                                                    href="{{ route('admin.comity.delete', $item->id) }}"><i
                                                        class="text-danger" data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data found.</td>
                                    </tr>
                                @endif


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Name</th>
                                    <th>Visibility</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
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
            $('.delete-comity').on('click', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                var actionText = "Comity";

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

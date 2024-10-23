@extends('layouts.app')
@section('title', 'Member List')

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
                        <li class="breadcrumb-item active" aria-current="page">Members</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.members.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Add New</button>
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
                                    <th class="text-wrap">Name</th>
                                    <th class="text-wrap">Member ID</th>
                                    <th class="text-wrap">Membership</th>
                                    <th class="text-wrap">Email</th>
                                    <th class="text-wrap">Contact No.</th>
                                    <th class="text-wrap">Status</th>
                                    <th class="text-wrap">Created At</th>
                                    <th class="text-wrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($members->isNotEmpty())
                                    @foreach ($members as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a class="d-flex align-items-center gap-3" href="{{ route('admin.members.edit', $item->id) }}">
                                                    <div class="customer-pic">
                                                        <img src="{{ isset($item->profile_image_media) ? asset('storage/' . $item->profile_image_media->file_path) : '' }}" class="rounded-circle" width="40" height="40" alt="">
                                                    </div>
                                                    <p class="mb-0 customer-name fw-bold">{{ $item->full_name }}</p>
                                                </a>
                                            </td>
                                            <td>{{ $item->member_id }}</td>
                                            <td> 
                                                {{ $item->member_category ? $item->member_category->name : 'No Category' }}


                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->mobile_number }}</td>
                                            <td>{!! getStatus($item->status) !!}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.members.edit', $item->id) }}">
                                                    <i class="text-primary" data-feather="edit"></i></a>

                                                <a class="delete-member"
                                                    href="{{ route('admin.members.delete', $item->id) }}"><i
                                                        class="text-danger" data-feather="trash-2"></i></a>


                                                <a class="btn btn-success btn-sm" href="{{ route('admin.members.show', $item->id) }}">Details</a>

                                                <a class="btn btn-info btn-sm" href="{{ route('admin.members.id-card', $item->id) }}">ID Card</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data found.</td>
                                    </tr>
                                @endif


                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot> -->
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
            $('.delete-member').on('click', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                var actionText = "Member";

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
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
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
                                        'There was an error deleting the ' + actionText + '';
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

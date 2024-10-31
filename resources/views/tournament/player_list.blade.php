@extends('layouts.app')
@section('title', 'Players List')
@section('css')
<style>
    td {
        padding: 0; /* Removes cell padding */
        margin: 0; /* Removes any margin (if any) */
        text-align: left;
    }
</style>
@endsection
@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tournament</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Players List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tournaments.clubs',request()->segment(4)) }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        {{-- <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-wrap">Sl. No.</th>
                                    <th class="text-wrap">Player Name</th>
                                    <th class="text-wrap">Father Name</th>
                                    <th class="text-wrap">Phone Mumber</th>
                                    <th class="text-wrap">Whatsapp Mumber</th>
                                    <th class="text-wrap">Date of Birth</th>
                                    <th class="text-wrap">Age</th>
                                    <th class="text-wrap">Aadhar Number</th>
                                    <th class="text-wrap">Address</th>
                                    <th class="text-wrap">District</th>
                                    <th class="text-wrap">Created At</th>
                                    <th class="text-wrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($playersInTournamentsClub->isNotEmpty())
                                    @foreach ($playersInTournamentsClub as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a class="d-flex align-items-center gap-3" href="{{ route('admin.members.edit', $item->id) }}">
                                                    <div class="customer-pic">
                                                        <img src="{{ isset($item->profile_image_media) ? asset('storage/' . $item->profile_image_media->file_path) : '' }}" class="rounded-circle" width="40" height="40" alt="">
                                                    </div>
                                                    <p class="mb-0 customer-name fw-bold">{{ $item->player_name }}</p>
                                                </a>
                                            </td>
                                            <td>{{ $item->father_name }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->whatsapp_number }}</td>
                                            <td>{{ format_date($item->date_of_birth) }}</td>
                                            <td>{{ $item->age }}</td>
                                            <td>{{ $item->aadhar_number }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->district->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.members.edit', $item->id) }}">
                                                    <i class="text-primary" data-feather="edit"></i></a>

                                                <a class="delete-member"
                                                    href="{{ route('admin.members.delete', $item->id) }}"><i
                                                        class="text-danger" data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11" class="text-center">No data found.</td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            @if ($playersInTournamentsClub->isNotEmpty())
                @foreach ($playersInTournamentsClub as $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Srl.</strong></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td rowspan="9" class="no-border"><img src="{{ isset($item->profile_image_media) ? asset('storage/' . $item->profile_image_media->file_path) : '' }}" alt="Player Image" style="width:100%; height:auto;"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Player</strong></td>
                                            <td>{{ $item->player_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Father's Name</strong></td>
                                            <td>{{ $item->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone & Whatsapp</strong></td>
                                            <td>{{ $item->phone_number }} / {{ $item->whatsapp_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Age</strong></td>
                                            <td>{{ $item->age }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Aadhaar Number</strong></td>
                                            <td>{{ $item->aadhar_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td>{{ $item->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>District</strong></td>
                                            <td>{{ $item->district->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth</strong></td>
                                            <td>{{ format_date($item->date_of_birth) }}</td>
                                        </tr>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">No data found.</td>
                </tr>
            @endif
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

@endsection

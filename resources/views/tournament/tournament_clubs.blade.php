@extends('layouts.app')
@section('title', 'Tournament Clubs')


@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> 
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
                        <li class="breadcrumb-item active" aria-current="page">Tournament Clubs List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tournaments.assign-clubs',request()->segment(3)) }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Assign Club</button>
                </a>
                <a href="{{ route('tournament.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-warning px-5">Back</button>
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
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Club Name</th>
                                        <th>Players Registred</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($club_in_tournamets->isNotEmpty())
                                    @foreach ($club_in_tournamets as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->club->club_name }}</td>
                                            <td>{{ $item->total_players }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('tournaments.player-list',[$item->club_registrations_id,request()->segment(3)]) }}">Players List</a>
                                                <a class="btn btn-success" href="{{ route('tournaments.invoice',[$item->club_registrations_id,request()->segment(3)]) }}">Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Clubs found.</td>
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

@extends('layouts.app')
@section('title', 'Comity')
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
                        <li class="breadcrumb-item active" aria-current="page">Comity</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">



            <div class="col-12 col-lg-5 d-flex">
                <div class="card w-100">
                    <form action="{{ route('admin.committe.members.store') }}" method="POST" id="assignMembersForm">
                        <input type="hidden" value="{{ $committe_id }}" name="committe_id">
                        @csrf
                        <div class="card-body">
                            <!-- Assign button triggers form submission -->

                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-plus-lg me-2"></i>Assign
                            </button>

                        </div>

                        <div class="customer-notes mb-3">
                            <div class="bg-light mx-3 my-0 rounded-3 p-3">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>
                                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                                </th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($members->isNotEmpty())
                                                @php
                                                    $i = 1;
                                                    $count = 0;
                                                @endphp
                                                @foreach ($members as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>
                                                            <!-- Checkbox for selecting a member -->
                                                            <input class="form-check-input member-checkbox" type="checkbox"
                                                                value="{{ $item->id }}"
                                                                name="selected_members[{{ $count }}][member_id]">
                                                        </td>
                                                        <td>{{ $item->full_name }}</td>
                                                        <td>
                                                            <select name="selected_members[{{ $count }}][designation_id]"
                                                                class="form-select">
                                                                <option value="">Select Designation</option>
                                                                @foreach ($designations as $designation)
                                                                    <option value="{{ $designation->id }}">
                                                                        {{ $designation->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">No data found.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-12 col-lg-7 d-flex">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="mb-3">{{ getCommitee($committe_id)->name }}</h5>

                    </div>
                    <div class="customer-notes mb-3">
                        <div class="bg-light mx-3 my-0 rounded-3 p-3">
                            <div class="product-table">
                                <div class="table-responsive white-space-nowrap">
                                    <table class="table align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>Name</th>
                                                <th>Designations</th>
                                                <th>Status</th>
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
                                                            @if ($item->designation)
                                                            <button type="button"
                                                            class="btn btn-outline-success">{{ $item->designation->name ?? 'Not Assigned' }}</button>
                                                            @else
                                                            <button type="button"
                                                            class="btn btn-outline-info">Not Assigned</button>
                                                            @endif
                                                            
                                                        </td>


                                                        <td>
                                                            {!! getStatus($item->member->status) !!}
                                                        </td>



                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center">No data found.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->



    </div>
@endsection

@section('scripts')

    <script>
        document.getElementById('selectAll').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('.member-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
        });
    </script>


@endsection

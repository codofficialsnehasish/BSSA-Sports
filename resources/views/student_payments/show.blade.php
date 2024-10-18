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
                        <li class="breadcrumb-item active" aria-current="page">Payment Details</li>
                    </ol>
                </nav>
            </div>
            <!-- <div class="ms-auto">
                <a href="{{ route('admin.student.payment.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Make New Payments</button>
                </a>
            </div> -->
        </div>
        <!--end breadcrumb-->

        <div class="row">

          

            <div class="card">

                
                <div class="card-body">
                @foreach($result as $year => $months)
                    <h3>{{ $year }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach($months as $month => $data)
                                <th>{{ DateTime::createFromFormat('!m', $data['month'])->format('F') }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($months as $month => $data)
                                <td class="text-wrap text-white {{ $data['status'] === 'Paid' ? 'bg-success' : ($data['status'] === 'Due' ? 'bg-danger' : '') }}">
                                    @if($data['paid'] !== null)
                                        {{ $data['paid'] > 0 ? $data['paid'] : '0' }}
                                        <br>
                                        {{-- $data['which_for'] ?? '' --}}
                                    @else
                                        {{ 'N/A' }} <!-- For months before admission -->
                                    @endif
                                    <br>
                                    <strong>{{ $data['status'] }}</strong>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @endforeach

                </div>
            </div>
        </div>



    </div>
@endsection

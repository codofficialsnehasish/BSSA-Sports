@extends('layouts.app')
@section('title', 'Edit Category')
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
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Add Category</h5>
                        <form class="row g-3" id="jQueryValidationForm" action="{{ route('admin.category.update') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="col-md-12">
                                <label for="input1" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="input1"
                                    placeholder="Category Name Here ..." name="name" value="{{ old('name', $data->name) }}"
                                    required>
                            </div>


                            <div class="col-md-12">
                                <label for="input7" class="form-label">Visibility</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible"
                                        id="is_visible_default1"  value="1" {{ $data->is_visible == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_visible_default1">Show</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible"
                                        id="is_visible_default2" value="0" {{ $data->is_visible == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_visible_default2">Hide</label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                    <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            @if (session('success'))
                round_success_noti('{{ session('success') }}');
            @endif

   
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    round_error_noti('{{ $error }}');
                @endforeach
            @endif
        });
    </script>



@endsection

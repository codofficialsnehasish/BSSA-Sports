@extends('layouts.app')
@section('title', 'Expenses')
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
                        <li class="breadcrumb-item active" aria-current="page">Add Expenses</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('expenses.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row mt-3">
                                <table width="100%" cellpadding="5" cellspacing="5" id="table_repeter">
                                    <tr>
                                        <th width="1%">Date</th>
                                        <th width="5%">Expense Name</th>
                                        <th width="10%">Main A/C Category</th>
                                        <th width="10%">Receipt No.</th>
                                        <th width="20%">Amount</th>
                                        <th width="16%">Remarks (Optional)</th>
                                        <th width="16%">Descriptions (Optional)</th>

                                        <th width="4%">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="date" class="form-control" name="date[]" value="{{ date('Y-m-d') }}" required>
                                        </td>
                                        <td>
                                            {{-- <input type="text" class="form-control" name="expense_name[]" required> --}}
                                            <select name="expense_name[]" class="form-select" id="single-select-clear-field" data-placeholder="Choose one thing" required>
                                                <option value selected disabled>Select a Expance Type</option>
                                                @foreach($expense_categorys as $expense_category)
                                                <option value="{{ $expense_category->id }}">
                                                    {{ $expense_category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" id="single-select-clear-field" data-placeholder="Choose one thing" name="tournament_category_id[]">
                                                <option value selected disabled>Choose Category</option>
                                                @foreach ($tournament_categorys as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter Receipt No." name="memo_no[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="amount[]" required step="0.01">
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control" name="remarks[]"></textarea>
                                        </td>
                                        <td>
                                            <input type="test" class="form-control" name="desc[]" >
                                        </td>
                                    </tr>
                                </table>
                                <div  id="more1"><a class="btn btn-success btn-sm float-end" href="javascript:;" onClick="showMore_edit('field_1');"><i class="fa fa-plus"></i>Add More</a></div>
                                <p>&nbsp;</p>
                                <input type="hidden" name="cont" id="cont" value="1" />
                            </div>
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                {{-- <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-2 col-xl-2">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">

                                <h5 class="mb-4">Submit</h5>

                            </div>
                            <div class="card-body p-4">
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                        <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div>




    </div>
@endsection


@section('scripts')

    <script>
		function showMore_edit(id){
            var idd = id.split("_");
            var idty = parseInt(idd[1]);
            idty = idty + 1;
            var table = document.getElementById("table_repeter");
            console.log(table);
            var rowCount = table.rows.length;
            
            var row = table.insertRow(rowCount);
            var cell0 = row.insertCell(0);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            console.log(cell0,cell1, cell2, cell3);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            document.getElementById("cont").value = idty;
               
				
			// cell1.innerHTML = '<input type="text" class="form-control" name="expense_name[]" required>';
            cell1.innerHTML = '<input type="date" class="form-control" name="date[]" value="{{ date('Y-m-d') }}" required>'
            
            cell2.innerHTML = '<select class="form-select" name="expense_name[]" id="single-select-clear-field" data-placeholder="Choose one thing" required><option value selected disabled>Select a Expance Type</option><?php foreach($expense_categorys as $type){?><option value="<?= $type->id;?>"><?= $type->name;?></option><?php }?></select>'

            cell3.innerHTML = '<select class="form-select" name="tournament_category_id[]" id="single-select-clear-field" data-placeholder="Choose one thing"><option value selected disabled>Choose Category</option><?php foreach($tournament_categorys as $item){?><option value="<?= $item->id;?>"><?= $item->name;?></option><?php }?></select>'
				
			cell4.innerHTML = '<input type="text" class="form-control" placeholder="Enter Receipt No." name="memo_no[]" required>';
			
            cell5.innerHTML = '<input type="number" class="form-control" name="amount[]" required step="0.01">';

            cell6.innerHTML = '<textarea type="text" class="form-control" name="remarks[]"></textarea>';
            cell7.innerHTML = '<input type="text" class="form-control" name="desc[]">';
            
            cell8.innerHTML = "<a  href=\"javascript:;\" class=\"btn btn-danger btn-sm\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Remove this Item\" onClick=\"deleteRow(this)\"><i class=\"text-danger\" data-feather=\"trash-2\"></i>Del</a>";
                 

				  
			document.getElementById("more1").innerHTML = "<a class=\"btn btn-success btn-sm float-end\" href=\"javascript:;\" onClick=\"showMore_edit('field_" + idty + "');\"><i class=\"fa fa-plus\"></i>Add More</a>";
                
                
        }

        function deleteRow(btn) {
            if (confirm("Are You Sure?") == true) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            } else { }
		}
    </script>

@endsection
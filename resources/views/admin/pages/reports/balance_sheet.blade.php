@extends('admin.files.base')
@section('content')

<div class="container-fluid">

    <!--page title-->
    <div class="page-title mb-4 d-flex align-items-center">
        <div class="mr-auto">
            <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Data Table</h4>
            <nav aria-label="breadcrumb" class="d-inline-block ">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">DataTable</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--/page title-->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Balance Sheet</div>


                        <div class="float-right">
                        <a class="btn btn-primary" href="{{route('export_balance_sheet_pdf')}}">
                                Export PDF
                        </a>
                            <button class="btn btn-success">
                                Export EXCEL
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    {{-- <form method="get">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Company</label>
                                    <select class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label>Department</label>
                                <select class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Designation</label>
                                <select class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Employee</label>
                                <select class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>



                    </form> --}}



                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                                role="grid" aria-describedby="data_table_info">
                                <thead>
                                    <tr role="row">
                                        
                                        <th rowspan="1" colspan="1">Employee ID</th>
                                        <th rowspan="1" colspan="1">Employee Name</th>
                                        <th rowspan="1" colspan="1">Basic Salary</th>
                                        <th rowspan="1" colspan="1">NO. WD</th>
                                        
                                        <th rowspan="1" colspan="1">NO. WDS</th>

                                        <th rowspan="1" colspan="1">EPF</th>
                                        <th rowspan="1" colspan="1">ESIC</th>
                                        <th rowspan="1" colspan="1">Net Payment</th>
                                        <th rowspan="1" colspan="1">Date of Payment</th>

                            
                                      
                                </thead>

                                <tbody>

                                    @foreach($balances as $balance)
                                    <tr role="row" class="odd">
                                    <td class="sorting_1">{{$balance->empoyee_id}}</td>
                                    <td class="sorting_1">{{$balance->name}}</td>
                                    <td>{{$balance->salary}}</td>
                                        <td>{{$balance->number_of_working_hours}}</td>
                                        <td>{{$balance->working_day_salary}}</td>
                                        <td>{{$balance->epf}}</td>
                                        <td>{{$balance->esic}}</td>
                                        <td>{{$balance->net_payment}}</td>
                                       

                                    <td>

                                        @if($balance->date_of_transfer)
                                        {{$balance->date_of_transfer}}
                                        @else
                                    <a href="{{route('add_date_of_payment' , $balance->balance_id)}}" class="btn btn-info btn-sm">Add Date of payment</a>
                                        @endif
                                    </td>
                    
                                    
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


@stop

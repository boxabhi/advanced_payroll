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
                        <div class="custom-title">EPF report</div>


                        <div class="float-right">
                            <a href="{{route('export_epf_pdf')}}" class="btn btn-primary">
                                Export PDF
                            </a>
                            <button class="btn btn-success">
                                Export EXCEL
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                                role="grid" aria-describedby="data_table_info">
                                <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1">Employee ID</th>
                                        <th rowspan="1" colspan="1">Employee Name</th>
                                        <th rowspan="1" colspan="1">UAN number</th>
                                        <th rowspan="1" colspan="1">Base</th>
                                        <th rowspan="1" colspan="1">Amount taken</th>
                                        <th rowspan="1" colspan="1">Total Installment</th>
                                        <th rowspan="1" colspan="1">Pending Amount</th>

                                        <th rowspan="1" colspan="1">Pending installments</th>
                                        <th rowspan="1" colspan="1">Per installments amount</th>
                                        
                                </thead>

                                <tbody>

                                    @foreach($emi as $emi)
                                    <tr role="row" class="odd">
                                    <td class="sorting_1">{{$emi->empoyee_id}}</td>
                                    <td class="sorting_1">{{$emi->name}}</td>
                                    <td>{{$emi->un_number}}</td>
                                        <td>{{$emi->salary}}</td>
                                        <td>{{$emi->amount}}</td>
                                        <td>{{$emi->installment}}</td>
                                        <td>{{$emi->pending_amount}}</td>
                                        <td >{{$emi->pending_installment}}</td>
                                        <td>{{$emi->per_installment}}</td>
                                        
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                            {{-- {{ $emi->links() }} --}}
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>


    </div>
</div>


@stop

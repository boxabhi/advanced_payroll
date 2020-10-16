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
                        <div class="custom-title">Wages report</div>


                        <div class="float-right">
                        <a href="{{route('export_wages_pdf')}}" class="btn btn-primary">
                                Export PDF
                        </a>
                            <a class="btn btn-success" href="{{route('export_goverment_excel')}}">
                                Export EXCEL
                            </a>
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
                                        
                                        <th rowspan="1" colspan="1">IP number</th>
                                        <th rowspan="1" colspan="1">IP Name</th>
                                       
                                    
                                        <th rowspan="1" colspan="1">No of Days </th>
                                        <th rowspan="1" colspan="1">Total Monthly Wages</th>
                                        <th rowspan="1" colspan="1"> Reason Code for Zero
                                        </th>
                                        <th rowspan="1" colspan="1">Last working day</th>

                                     

                                      
                                </thead>

                                <tbody>

                                    @foreach($wages as $wages)
                                    <tr role="row" class="odd">
                                        <td>{{$wages->un_number}}</td>
                                    <td class="sorting_1">{{$wages->name}}</td>
                                   
                            
                                        <td>{{$wages->total_days}}</td>
                                        <td>{{$wages->total_wages}}</td>

                                        <td>{{$wages->reason_code_zero}}</td>
                                        <td>{{$wages->last_working_day}}</td>
                                   

                    
                                    
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

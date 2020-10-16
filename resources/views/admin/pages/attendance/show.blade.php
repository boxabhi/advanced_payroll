@extends('admin.files.base')
@section('content')

<div id="app">
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
        <div class="bg-white p-3">
            <form action="{{route('show_attendance')}}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>From date</label>
                        <input type="date" class="form-control" name="from_date">
                    </div>
                    <div class="col-md-3">
                        <label>To date</label>
                        <input type="date" class="form-control" name="to_date">
                    </div>
                </div>
                <x-filter class="mt-3" />



            </form>



            <div class="row mt-3">
                <div class="col-sm-12">
                    <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                        role="grid" aria-describedby="data_table_info">
                        <thead class="mt-3">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 177px;">Employee ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 177px;">Employee name</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 177.6px;">
                                    Present day</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Office: activate to sort column ascending" style="width: 133.8px;">
                                    Absent day</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending" style="width: 64.2px;">Leave day</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending" style="width: 123.4px;">
                                    Holiday day</th>
                                
                            </tr>
                        </thead>
         
                        <tbody>


                            {{-- <tr role="row" class="even">
                                <td class="sorting_1">Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2012/03/29</td>
                                <td>$433,060</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </div>
</div>

@stop

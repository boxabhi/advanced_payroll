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
                            <button class="btn btn-primary">
                                Export PDF
                            </button>
                            <button class="btn btn-success">
                                Export EXCEL
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <form method="get">

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



                    </form>



                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                                role="grid" aria-describedby="data_table_info">
                                <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1">Employee ID</th>
                                        <th rowspan="1" colspan="1">UAN number</th>
                                        <th rowspan="1" colspan="1">Base</th>
                                        <th rowspan="1" colspan="1">NO. WH</th>
                                        <th rowspan="1" colspan="1">NO. WDS</th>
                                        <th rowspan="1" colspan="1">Amount charge EMP</th>
                                        <th rowspan="1" colspan="1">Amount charge GOV</th>
                                        <th rowspan="1" colspan="1">Total</th>
                                </thead>

                                <tbody>

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                        <td>$162,700</td>

                                        <td>$162,700</td>

                                    </tr>

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

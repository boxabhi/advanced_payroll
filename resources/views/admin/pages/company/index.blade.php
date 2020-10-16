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
        <div class="col-xl-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Datatable</div>
                    </div>
                </div>
                <div class="card-body- pt-3 pb-4">
                    <div class="table-responsive">
                        <div id="data_table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="data_table_length"><label>Show <select
                                                name="data_table_length" aria-controls="data_table"
                                                class="form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="data_table_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="data_table"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="data_table" class="table table-bordered table-striped dataTable"
                                        cellspacing="0" role="grid" aria-describedby="data_table_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th class="sorting_asc" colspan="1">
                                                    Compnay name</th>
                                                <th rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th rowspan="1" colspan="1">Company Name</th>
                                                <th rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @foreach($companies as $company)
                                            <tr role="row" class="odd">
                                                <td>{{ $loop->index + 1 }}</td>
                                            <td class="sorting_1">{{$company->company}}</td>
                                                <td class="text-center">

                                                <a class="btn btn-danger" href="{{ route('company.destroy' , $company->id)}}">
                                                    <i class="ti-trash"></i> Delete Company
                                                </a>


                                                <a class="btn btn-success" href="{{ route('company.destroy' , $company->id)}}">
                                                    <i class="ti-bookmark-alt"></i> Edit Company
                                                </a>


                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="data_table_info" role="status" aria-live="polite">
                                        Showing 1 to 25 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="data_table_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="data_table_previous"><a href="#" aria-controls="data_table"
                                                    data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="data_table" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="data_table" data-dt-idx="2" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="data_table" data-dt-idx="3" tabindex="0"
                                                    class="page-link">3</a></li>
                                            <li class="paginate_button page-item next" id="data_table_next"><a href="#"
                                                    aria-controls="data_table" data-dt-idx="4" tabindex="0"
                                                    class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@stop

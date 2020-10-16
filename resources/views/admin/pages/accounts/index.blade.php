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
                        <div class="custom-title">Create Admin | Sub Admin | User</div>
                    </div>
                </div>


                <div class="row container mt-3 p-4">
                    <table id="data_table" class="table table-bordered container p-5 table-striped dataTable" cellspacing="0"
                        role="grid" aria-describedby="data_table_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 177px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 286.6px;">
                                    Email</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Office: activate to sort column ascending" style="width: 133.8px;">
                                    Created At</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending" style="width: 64.2px;">Block</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending" style="width: 123.4px;">
                                    Action</th>
                               
                            </tr>
                        </thead>
                       
                        <tbody>


                            @foreach($users as $user)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href="" class="btn btn-danger btn-sm">Block User</a></td>
                                <td>
                                <a href="{{route('change_password' , $user->id)}}" class="btn btn-success btn-sm">Reset password</a>
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


@stop

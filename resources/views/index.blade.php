@extends('admin.files.base')
@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-success">
                    <div class="custom-title"> Statistics</div>
                    <div class=" widget-action-link">
                       
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="water-mark-text">
                     Statistics
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-4">
                        <span class="text-primary mb-5 d-inline-block"><i class="fa fa-bolt mr-3"></i>Payroll Management System</span> </span>
                        <h1 class="mb-0">{{$employee}} EMPLOYEE</h1>
                      
                      
                    </div>
                    <div class="col-xl-9 col-sm-8">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="text-center  mb-4">
                                    <div class="rounded-circle bg-danger sr-icon-box-lg bubble-shadow-md d-inline-block mb-2">
                                        <i class="vl_user-male"></i>
                                    </div>
                                    <div class="d-block">
                                    <h3 class="text-uppercase mb-0 weight500 text-danger">{{$employee}}</h3>
                                        <span class="text-muted">Total Employee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="text-center mb-4">
                                    <div class="rounded-circle bg-purple sr-icon-box-lg bubble-shadow-md d-inline-block mb-2">
                                        <i class="vl_star"></i>
                                    </div>
                                    <div class="d-block">
                                    <h3 class="text-uppercase mb-0 weight500 text-purple">{{$designation}}</h3>
                                        <span class="text-muted">Total Designation</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="text-center  mb-4">
                                    <div class="rounded-circle bg-warning sr-icon-box-lg bubble-shadow-md d-inline-block mb-2">
                                        <i class=" vl_chat-bubble"></i>
                                    </div>
                                    <div class="d-block">
                                    <h3 class="text-uppercase mb-0 weight500 text-warning">{{$department}}</h3>
                                        <span class="text-muted">Total Departments</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="text-center  mb-4">
                                    <div class="rounded-circle bg-success sr-icon-box-lg bubble-shadow-md d-inline-block mb-2">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="d-block">
                                    <h3 class="text-uppercase mb-0 weight500 text-warning">{{$company}}</h3>
                                        <span class="text-muted">Total Company</span>
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


</div>

@stop
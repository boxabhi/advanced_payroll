@extends('admin.files.base')
@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Create Company/Department</div>
                    </div>
                </div>

               


                <div class="card-body">

                    <x-alert />
                    <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" name="name" required class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter  name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" required name="email" required  class="form-control" id="short_code"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                            </div>
                

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Password</label>
                                    <input type="password" required name="password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter password">

                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Authorization level</label>
                                    <select class="form-control" name="level" required>

                                        <option value="3">Admin</option>
                                        <option value="2">Sub-Admin</option>
                                        <option value="1">User</option>
                                    </select>
                                </div>
                            </div>
                        <div class="text-center container">
                            <button type="submit" class="btn btn-purple">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

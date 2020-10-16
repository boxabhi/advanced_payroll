@extends('admin.files.base')
@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Change Password</div>
                    </div>
                </div>


                <div class="card-body">

                    <x-alert />


                <form method="post" action="{{route('change_password_post' , $user->id)}}" >
                        {{@csrf_field()}}

                        <div class="row">
                            <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{$user->email}}" disabled="disabled">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-purple">Change Password</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@stop
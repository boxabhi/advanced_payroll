@extends('admin.files.base')
@section('content')




<div class="container">
    <div class="row shadow">
        <div class="col-xl-12 d-lg-flex align-items-center">
            <!--login form-->
            <div class="login-form">
                <div class="text-center">
                <img src="/logo.png" class="img-responsive img-fluid" height="40">
                </div>
                <h4 class="text-uppercase text-purple text-center mb-3 mt-2">Login to Admin Panel</h4>
            <form action="{{route('loginuser')}}">
                <x-alert/>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control"   placeholder="Enter email">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>

                    <div class="form-group clearfix">
                       
                        <button type="submit" class="btn btn-purple btn-block float-right">LOGIN</button>
                    </div>

                    
                </form>
            </div>
            <!--/login form-->

            <!--login promo-->
            <div class="login-promo basic-gradient  text-white position-relative">
                <div class="login-promo-content text-center">
                    <a href="#" class="mb-4 d-block">
                        <img class="pr-3" src="/logo.png" srcset="assets/img/logo-icon@2x.png 2x" alt="">
                        <span class="text-uppercase weight800 text-white f18">Saiinfotechindia.org</span>
                    </a>
                    <h1 class="text-white">Admin Panel</h1>
                    
                </div>
            </div>
            <!--/login promo-->

        </div>
    </div>
</div>


@stop
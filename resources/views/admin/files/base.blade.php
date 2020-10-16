

 @include('admin.files.head')
 @include('admin.files.css')

 


<body class="fixed-nav">

    @if(Auth::check())
    @include('admin.files.sidebar')
   
    <!--main content wrapper-->
    <div class="content-wrapper">
        @yield('content')
       
     
        <!--footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>  Payroll Management Developed by <b>Gnariumiqnovative.com</b></small>
                </div>
            </div>
        </footer>
        <!--/footer-->
    </div>

    @else
    @yield('content')
    @endif


    @include('admin.files.scripts')
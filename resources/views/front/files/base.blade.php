
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('front.files.seo')
 @include('front.files.css')


    
</head>

<body>
    <!--::header part start::-->
   
    @include('front.files.navbar')
   
   
        @yield('content')
   
   
    <!-- footer part end-->

    {{-- @include('front.files.footer') --}}
    @include('front.files.scripts')
   
   

    
</body>

</html>
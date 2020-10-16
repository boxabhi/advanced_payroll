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
                        <div class="custom-title">Quick Attendace</div>
                    </div>
                </div>


                
          

            <div class="row container mt-3">
               
                <form method="get" class="container">
                    <x-filter />
                </form>
               
            </div>

           

            @if($employees)
            <div class="container">
               <h4 class="text-center mt-4 mb-4"> Mark Attendace for Employee</h4> 
               <x-alert/>
            <table class="table table-striped container">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">EMPID</th>
                    <th scope="col">Name</th>
                    <th>Company</th>
                    <th>Department</th>

                    <th>Designation</th>


                    <th>Attendace</th>
                </tr>
                </thead>
                <tbody>
            @foreach($employees as $employee)
           
                <tr>
                    <th scope="row">1</th>
                <td>{{$employee->empoyee_id}}</td>
                <td>{{$employee->name}}</td>
                <td><b>{{$employee->company}}</b></td>
                <td><b>{{$employee->department}}</b></td>

                <td><b>{{$employee->desgination}}</b></td>


                    <td >
                     
                    <a  href="{{route('mark_detail' , $employee->id)}}" class="btn btn-primary ml-3">Mark</a>
                       
                    </td>
                </tr>
               
               
            @endforeach
        </tbody>
    </table>

            </div>
            @endif



        </div>

    </div>
</div>

</div>



<script>

function reload( query, value){
       
       let uri = window.location.href.split('?');
             var url = uri[0];
             if (uri.length == 1) {
               window.location.replace(`/admin/attendace?${query}=${value}`)
             }
   
             var query_string = uri[1].split('&')
             var flag = 0;
             for (var i = 0; i < query_string.length; i++) {
               var str = query_string[i];
               if (str.includes(`${query}`)) {
                 flag = 1
                 query_string[i] = `${query}=${value}`
                 break;
               }
             }
   
             if (flag == 0) {
               var final_query_string = query_string.join('&');
   
               window.location.replace(url + '?' + final_query_string + `&${query}=${value}`)
               return;
             }
   
             url += '?'
             var final_query_string = query_string.join('&');
             window.location.replace(url + final_query_string)

    }

    function find_by_company(e){
        var value = document.getElementById('select_id').value
        reload('company' , value)
    }

    function find_by_desgination(e){
        var value = document.getElementById('select_id_two').value
        reload('designation' , value)
    }

   </script>


@stop
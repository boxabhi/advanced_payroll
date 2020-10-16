@extends('admin.files.base')
@section('content')



<div class="container-fluid">

    <div class="card card-shadow mb-4 ">
        <div class="card-body">
            <div class="text-center">
                <div class="mt-4 mb-3">
                    <img class="rounded-circle" src="/asset/employee/photo/{{$employee->photo}}" width="85" height="85"
                        alt="">
                </div>
                <h5 class="text-uppercase mb-0">{{$employee->name}}</h5>
                <p class="text-muted mb-0">{{$employee->department}} | {{$employee->desgination}} </p>

            </div>


            <table class="table table-bordered table-striped dataTable mt-5 ">
                <thead>
                  <tr>
                    <th scope="col">Employee name</th>
                    <th scope="col">Employee Id</th>
                    <th scope="col">Father name</th>
                    <th scope="col">Mother name</th>

                    <th scope="col">Date of Joining</th>
                    <th scope="col">Date of Birth</th>
                    
                    <th scope="col">Mobile</th>
                    <th scope="col">Alternate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <th scope="row">{{$employee->name}}</th>
                  <td>{{$employee->empoyee_id}}</td>
                  <td>{{$employee->father_name}}</td>
                  <td>{{$employee->mother_name}}</td>
                  <td>{{$employee->date_of_joining}}</td>
                  <td>{{$employee->dob}}</td>
                
                  <td>{{$employee->mobile}}</td>
                  <td>{{$employee->alternate}}</td>

                  </tr>
                 
                </tbody>
              </table>



            <p>Employee address - {{$employee->permanent_address}}</p>

              <table class="table table-bordered table-striped dataTable mt-5 ">
                <thead>
                  <tr>
                    <th scope="col">Guardian mobile</th>
                    <th scope="col">Father Occupation</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Nominee name</th>
                    <th scope="col">Nominee mobile</th>
                    <th scope="col">Nominee relation</th>
                    <th scope="col">Adhar number</th>
                    <th scope="col">Pan number</th>
                    <th scope="col">Account number</th>
                    <th scope="col">Bank name</th>
                    <th scope="col">IFSC</th>
                    <th scope="col">UN NUMBER</th>
                    <th scope="col">Salary</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <th scope="row">{{$employee->guardian_mobile}}</th>
                  <td>{{$employee->father_occupation}}</td>
                  <td>{{$employee->qualification}}</td>
                  <td>{{$employee->nominee_name}}</td>
                  <td>{{$employee->nominee_mobile}}</td>
                  <td>{{$employee->nominee_relation}}</td>

                  <td>{{$employee->adhar_number}}</td>
                  <td>{{$employee->pan_number}}</td>
                
                  <td>{{$employee->account_number}}</td>
                  <td>{{$employee->bank_name}}</td>
                  <td>{{$employee->bank_ifsc}}</td>
                  <td>{{$employee->un_number}}</td>
                  <td>{{$employee->salary}}</td>

                  </tr>                 
                </tbody>
              </table>



              <div class="container mt-5">


                <div class="row text-center">

                    <div class="col-md-4">
                        <img src="/asset/employee/signature/{{$employee->signature_image}}" class="img-responsive img-fluid" style="height:300px">
                    </div>

                    <div class="col-md-4">
                        <img src="/asset/employee/adhar/{{$employee->adhar_image}}" class="img-responsive img-fluid" style="height:300px">
                    </div>


                    <div class="col-md-4">
                        <img src="/asset/employee/pan/{{$employee->pan_image}}" class="img-responsive img-fluid" style="height:300px">
                    </div>
                </div>
                

              </div>




        </div>
    </div>

</div>




@stop

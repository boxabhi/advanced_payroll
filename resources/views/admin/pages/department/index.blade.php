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
                        <div class="custom-title">Create Department</div>
                    </div>
                </div>

            <form class="container mt-2" method="post" action="{{route('department.store')}}">
                <x-alert/>
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company</label>
                                <select class="form-control" name="company_id">
                                    <option value="0">No Company</option>
                                    @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->company}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label>Department name</label>
                            <div class="form-group">
                                <input  name="department" class="form-control" placeholder="Department name">
                            </div>
                        </div>
                        

                    </div>

                    <div class="text-center mb-2">
                    <button type="submit" class="btn btn-purple">Submit</button> 
                    </div>
                </form>


            </div>


            <div class="bg-white pt-3 ">
                <h3 class="text-center mb-3"> Department name</h3>
            <table class="table table-striped bg-white">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Company</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                  <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                  <td>{{$department->department}}</td>
                  <td>{{$department->company}}</td>
                    <td>@mdo</td>
                  </tr>

                  @endforeach
                 
                </tbody>
              </table>
        </div>
    </div>

</div>



</div>

@stop

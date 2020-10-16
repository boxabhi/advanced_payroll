@extends('admin.files.base')
@section('content')






<div class="container-fluid">
<div class="row">
    <div class="col-xl-6 col-md-6">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Create Designation</div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted">Create Designation for Payroll</p>
                <x-alert/>
                <form  method="post" action="{{route('designation.store')}}">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Department</label>
                        <select class="form-control" name="company_id" >
                          <option value="0">No department</option>
                          @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department}}</option>
                          @endforeach
                        </select>
                      </div>
                  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Designation Name</label>
                        <input type="text" name="designation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter designation name">
                    </div>
                 
                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-purple">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@stop
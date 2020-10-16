@extends('admin.files.base')
@section('content')






<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Create Salary Head</div>
                    </div>
                </div>
                <div class="card-body">

                    <x-alert />
                    <form method="post" action="{{route('salaryhead.store')}}">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Salary Head Code</label>
                                    <input required type="text" name="salary_head_code" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Salary head code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Salary Head Name</label>
                                    <input required type="text" name="salary_head_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Salary head name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Salary Head Nature</label>
                                    <select name="head_nature" required class="form-control">
                                        <option value="E">Earning</option>
                                        <option value="D">Deduction</option>
                                    </select>
                                
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount and Present</label>
                                    <select name="amount_and_present" required class="form-control">
                                        <option>Select</option>
                                        <option value="A">A</option>
                                        <option value="P">P</option>
                                    </select>
                                
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Remarks</label>
                            <textarea class="form-control" name="remarks" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                            </div>


                        </div>


                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>

@stop

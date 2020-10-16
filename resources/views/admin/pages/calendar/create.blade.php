@extends('admin.files.base')
@section('content')






<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Create Holiday Calendar</div>
                    </div>
                </div>
                <div class="card-body">

                    <x-alert />
                    <form method="post" action="{{route('calendar.store')}}">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Holiday Name</label>
                                    <input required type="text" name="holiday" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter holiday name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Holiday Date</label>
                                    <input required type="date" name="holiday_date" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" >
                                </div>
                            </div>

                        
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>


<div class="container">
    <h2 class="h4 text-center mb-4 mt-4"> All Holiday For this Year</h2>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Holiday</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($holidays as $holiday)
                      <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$holiday->holiday}}</td>
                      <td>{{$holiday->date_for_holiday}}</td>
                      <td><a href="{{route('calendar.destroy' ,[ $holiday->id])}}" class="btn btn-danger">
                        Del
                        </a>
                    </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>

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

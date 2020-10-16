@extends('admin.files.base')
@section('content')





<div class="row container-fluid">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Add date of payment</div>


                <form method="post" action="{{route('add_date_of_payment' , $data->id)}}">
                    {{csrf_field()}}
                    <x-alert/>
                    <div  class="row">

                        <div class="form-group col-md-6 mt-5">

                            <label>Add Date of payment</label>

                            <input class="form-control" type="date" name="date_of_payment">

                        </div>


                    </div>

                    <button type="submit" class="btn btn-purple">Submit</button>


                </form>

                </div>
            </div>
        </div>
    </div>
</div>






@stop
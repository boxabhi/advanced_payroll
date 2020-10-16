@extends('admin.files.base')
@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Create Company/Department</div>
                    </div>
                </div>

               


                <div class="card-body">

                    <x-alert />
                    <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">You are creating a?</label>
                            <select class="form-control" onchange="setValue()" id="select_id">
                              <option value="Company">Company</option>
                              <option value="Government department">Government Department</option>
                            </select>
                        </div>
                        <hr class="mt-4 mb-4">

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> Name</label>
                                    <input type="text" name="company" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter company name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> Short code</label>
                                    <input type="text" name="short_code" required  class="form-control" id="short_code"
                                        aria-describedby="emailHelp" placeholder="Enter company shortcode">
                                        </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> logo</label>
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input"
                                            id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                            file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter company email">

                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> Phone</label>
                                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter company email">

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> Website</label>
                                    <input type="text" name="website" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter company email">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span  class="text">Company</span> File upload</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input"
                                            id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                            file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span class="text">Company</span> Address</label>
                                    <textarea type="text" name="address" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"></textarea>

                                </div>
                            </div>

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



<script>

    function setValue(e){
        var value = (document.getElementById('select_id').value)
        var tags = document.querySelectorAll('.text')
        for(var i = 0; i < tags.length; i++){
            tags[i].innerHTML = value
        }

    }

   
 
</script>
@stop

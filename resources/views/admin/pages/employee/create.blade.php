@extends('admin.files.base')
@section('content')



<div id="app">
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Create Employee</div>
                    </div>
                </div>


                <div class="card-body">
                    <p class="text-muted">Create Company for Payroll</p>
                    <x-alert />
                    <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        
                        <div class="row bg-light p-4 " >
                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input type="text" required name="name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" >

                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee DOB</label>
                                    <input type="date" required name="dob" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee marital status</label>
                                    <select class="form-control" required name="marital_status" id="exampleFormControlSelect1">
                                        <option value="married">Married</option>
                                        <option value="unmarried">Unmarried</option>
                                     
                                    </select>
                               
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Fathers name</label>
                                    <input type="text" required name="father_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Mothers name</label>
                                    <input type="text" required name="mother_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" >
                                </div>
                            </div>



                   





                        </div>
                        <hr>
                        <p class="text-center">Employee Contact </p>
                        <div class="row mt-3 p-4 bg-light">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Permanent Address</label>
                                    <input class="form-control" required name="permanent_address" class="form-control"
                                       >
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Alternate</label>
                                    <input type="text" name="alternate" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" >
                                </div>
                            </div>


                         


                         

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Wife of</label>
                                    <input type="text" name="wife_of" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Wife Name">
                            
                               
                                    </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Guaradian Mobile</label>
                                    <input type="text" name="guardian_mobile" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Guardian">
                        
                                    </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Father Occupation</label>
                                    <input type="text" name="father_occupation" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="father_occupation">
                        
                                    </div>
                            </div>




                        
                        </div>


                        <hr>

                        <p class="text-center">Nominee Details</p>

                        <div class="row bg-light p-4 ">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nominee name</label>
                                    <input type="text" name="nominee_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"  required placeholder="Nominee Name">
                        
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nominee relation</label>
                                    <input type="text" name="nominee_relation"  required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Nominee relation">
                        
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nominee mobile</label>
                                    <input type="text" name="nominee_mobile" required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Nominee relation">
                        
                                    </div>
                            </div>


                        </div>

                        <hr>
                        <p class="text-center">Employee Qualification</p>

                        <div class="row p-4 bg-light">
                         
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee qualification</label>
                                    <input type="text" name="qualification" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>

                           
                       
                       
                        </div>

                       





                        <hr>
                        <p class="text-center">Employee Legal Details</p>
                            <div class="row p-4 bg-light">

                                <div class="col-md-4">
                                    <label>Employee Photo</label>
                                <div class="custom-file">
                                   
                                    <input type="file" name="photo"  class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                  </div>
    
                                </div>


                                <div class="col-md-4">
                                    <label>Employee Signature</label>
                                <div class="custom-file">
                                   
                                    <input type="file" name="signature" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                  </div>
    
                                </div>

                                <div class="col-md-4"></div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adhar Number </label>
                                    <input type="number" required name="adhar_number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                        
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <label>Upload Adhar</label>
                            <div class="custom-file">
                               
                                <input type="file" name="adhar_image" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PAN Number </label>
                                    <input type="number" name="pan_number" required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" >
                        
                                    </div>
                            </div>


                           
                       

                            <div class="col-md-4">
                                <label>Upload PAN</label>
                            <div class="custom-file">
                               
                                <input type="file" name="pan_image" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label"  for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>

                            </div>

                            <div class="col-md-4">
                                <label>Upload Additianal File</label>
                            <div class="custom-file">
                               
                                <input type="file" name="additional_file" class="custom-file-input" id="validatedCustomFile" >
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>

                            </div>
                       
                       


                            </div>

                            <hr>
                            <p class="text-center">Employee bank details</p>
                            <div class="row bg-light p-3">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Number </label>
                                    <input type="number" name="account_number" required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" >
                        
                                    </div>
                            </div>





                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name </label>
                                    <input type="number" name="bank_name" required class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                        
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank IFSC </label>
                                    <input type="text" name="bank_ifsc" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                        
                                    </div>
                            </div>
                            </div>

                            <hr>
                            <p class="text-center">Employee EPF ESIC</p>

                            
                            <div class="row p-4 bg-light">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">EPF no. </label>
                                    <input type="text" name="epf_no" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                        
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">ESIC no. </label>
                                    <input type="text" name="esic_no" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                        
                                </div>

                            </div>




                            <hr>
                            <p class="text-center">Employee Job Details</p>

                            <div class="row p-4 bg-light">


                                
                              <div class="col-md-4">

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Company name</label>
                                    <select name="company_name" @change="getDepartment"  required class="form-control" id="exampleFormControlSelect1">
                                        <option>Choose </option>
                                        @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->company}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Department name</label>
                                <select name="department_id" required  @change="getDesignation" class="form-control" id="exampleFormControlSelect1">
                                    <option>Choose</option>
                            
                          <option v-for="d in department" :value="d.id">[[d.department]]</option>
                             
                             
                                </select>
                              </div>
                    </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Designation name</label>
                                <select class="form-control"  required name="designation_name" id="select_id">
                                    <option>Choose</option>

                                    <option v-for="d in designation" :value="d.id">[[d.desgination]]</option>
                             
                             
                                </select>
                              </div>
                    </div>


                    
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Date of Joining </label>
                        <input type="date" name="date_of_joining" required class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
            
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputEmail1">UAN Number </label>
                        <input type="text" name="uan_number" required class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
            
                    </div>



                         
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Salary </label>
                        <input type="number" name="salary" required class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
            
                    </div>



                 


                        </div>


                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-purple">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>

</div>


</div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app = new Vue({
      delimiters: ['[[', ']]'],
      el: '#app',
      data: {
          message: 'Hello Vue!',
          department: [],
          designation: [],
          employee: [],
          company_id : null,
          department_id : null,
          designation_id : null

      },
      methods: {
         

        getDepartment(e){
            console.log("getDepartment")
            this.company_id = e.target.value;
            var _this = this;
            axios.get(`/api/department/${e.target.value}`)
            .then(function(response){
                _this.department = response.data
                console.log(_this.department)
            })
        },
        getDesignation(e){

         console.log("getDepartment")
            this.department_id = e.target.value;
            var _this = this;
            axios.get(`/api/designation/${e.target.value}`)
            .then(function(response){
                _this.designation = response.data
                console.log(_this.designation)
            })
        },
        getEmployee(e){
           
            this.designation_id = e.target.value;
            var _this = this;
            axios.get(`/api/employee/${_this.company_id}/${_this.department_id}/${_this.designation_id}`)
            .then(function(response){
                console.log(response)
                _this.employee = response.data
                console.log(_this.employee)
            })
        }

      }
    });
  </script>







@stop

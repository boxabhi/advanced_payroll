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
    <div id="app">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title">Find Employee</div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('emi.index')}}">
                            <x-filter />
                        </form>
                    </div>


                    <div class="row bg-white p-3">
                        <h4 class="mb-4 ml-3">Employee Data</h4>
                        <div class="col-sm-12">
                            @if(count($employees))
                            <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                                role="grid" aria-describedby="data_table_info">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 50px;">#</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 100px;">
                                            Company
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">Department
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Designation
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width:100px;">Employee ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 100px;">Name
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 100px;">
                                            Pay advance
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr role="row" class="odd">
                                        <td>{{$loop->index + 1}}</td>
                                        <td class="sorting_1">{{$employee->company}}</td>
                                        <td>{{$employee->department}}</td>
                                        <td>{{$employee->desgination}}</td>
                                        <td>{{$employee->empoyee_id}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{route('emi.show' , $employee->empoyee_id)}}">Pay</a>
                                            <a class="btn btn-purple btn-sm" href="{{route('emi.edit' , $employee->empoyee_id)}}">Update</a>

                                       
                                       
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p class="text-center">No data found</p>
                            @endif

                            {{ $employees->links() }}
                        </div>
                    </div>



                </div>



            </div>
        </div>
    </div>
</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"
    integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg=="
    crossorigin="anonymous"></script>
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
            company_id: null,
            department_id: null,
            designation_id: null

        },
        methods: {


            getDepartment(e) {
                console.log("getDepartment")
                this.company_id = e.target.value;
                var _this = this;
                axios.get(`/api/department/${e.target.value}`)
                    .then(function (response) {
                        _this.department = response.data
                        console.log(_this.department)
                    })
            },
            getDesignation(e) {

                console.log("getDepartment")
                this.department_id = e.target.value;
                var _this = this;
                axios.get(`/api/designation/${e.target.value}`)
                    .then(function (response) {
                        _this.designation = response.data
                        console.log(_this.designation)
                    })
            },
            getEmployee(e) {

                this.designation_id = e.target.value;
                var _this = this;
                axios.get(`/api/employee/${_this.company_id}/${_this.department_id}/${_this.designation_id}`)
                    .then(function (response) {
                        console.log(response)
                        _this.employee = response.data
                        console.log(_this.employee)
                    })
            }

        }
    });

</script>

@stop

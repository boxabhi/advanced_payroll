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
    <div class="card-body bg-white shadow">
        <x-alert />



        <div class="custom-title">Employee Salary</div>



        <div class="d-flex mt-3 mb-4">
            <h5 class="text-success">Employee name : {{$employee->name}}</h5>
        </div>




        <div class="row">
            <div class="col-sm-12">
                <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0" role="grid"
                    aria-describedby="data_table_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                style="width: 177px;">Basic Salary</th>
                            <th class="sorting text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-label="Position: activate to sort column ascending"
                                style="width: 100.6px;">Working
                                salary</th>
                                <th class="sorting text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-label="Position: activate to sort column ascending"
                                style="width: 100.6px;">Advanced amount 
                                </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 133.8px;">Day Count
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-label="Age: activate to sort column ascending" style="width: 70.2px;">
                                Day Present
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="data_table" rowspan="1"
                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                style="width: 123.4px;">Day
                                Absent</th>

                        </tr>
                    </thead>

                    <tbody>





                        <tr role="row" class="odd">
                            <td class="text-center">&#x20B9; {{$employee->salary}}</td>
                            <td class="text-center">&#x20B9; {{$total_working_salary}}</td>
                            <td class="text-center">&#x20B9; {{$amount_to_be_deducted}}</td>
                            <td class="text-center">{{$total_day_count}}</td>
                            <td class="text-center">{{$total_working_day}}</td>
                        <td class="text-center">{{$total_day_count - $total_working_day}}</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>






        <hr>

        <form method="post" action={{route('save_employee_salary_data')}}>
            {{ @csrf_field() }}

            <input type="hidden" name="emp_id" value="{{$employee->id}}">
            <input type="hidden" name="no_working_day" value="{{$total_working_day}}">
            <input type="hidden" name="no_working_salary" value="{{$total_working_salary}}">



            <div class="row mt-4">
                <div class="col-md-6">
                    <p>Earning side</p>
                    <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                        role="grid" aria-describedby="data_table_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 177px;">Code</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 100.6px;">
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Office: activate to sort column ascending" style="width: 100.8px;">
                                    IsAmt/Per
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending" style="width: 123.4px;">Value
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending" style="width: 123.4px;">
                                    Amount
                                </th>

                            </tr>
                        </thead>

                        <tbody>




                            @foreach($salaryHead as $ea)
                            @if($ea->head_nature == 'E')
                            @if($ea->salary_head_name == 'EPF' && $employee->salary > 15000)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ea->salary_head_code}}</td>

                                <td>{{$ea->salary_head_name}}</td>
                                <td>{{$ea->amount_and_present}}</td>
                                <td>
                                    <input type="text" id="earning_percentage_{{$loop->index}}"
                                       value="0" readonly="readonly"
                                        class="form-control"></td>
                                <td><input type="text" name="E_{{$ea->salary_head_name}}"
                                        id="earning_amount_{{$loop->index}}" class="form-control" value="0" readonly="readonly"></td>
                            </tr>
                            @else
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ea->salary_head_code}}</td>

                                <td>{{$ea->salary_head_name}}</td>
                                <td>{{$ea->amount_and_present}}</td>
                                @if ($ea->salary_head_name == 'ESIC' && $employee->salary > 21000)
                                <td>
                                    <input type="text" id="earning_percentage_{{$loop->index}}"
                                       readonly value="0"
                                        class="form-control"></td>
                                <td><input type="text" name="E_{{$ea->salary_head_name}}"
                                        id="earning_amount_{{$loop->index}}" readonly value="0" class="form-control">
                                </td>
                                @else
                                <td>
                                    <input type="text" id="earning_percentage_{{$loop->index}}"
                                        onchange="calculate_earning({{$loop->index}} , '{{$ea->amount_and_present}}' , 'E')"
                                        class="form-control"></td>
                                <td><input type="text" name="E_{{$ea->salary_head_name}}"
                                        id="earning_amount_{{$loop->index}}" class="form-control">
                                </td>

                                @endif
                            </tr>
                            @endif
                            @endif
                            @endforeach

                            <tr role="row" class="odd">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td>

                                    <input type="text" id="earning_side" class="form-control" disabled>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <p>Deduction side</p>
                    <table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
                        role="grid" aria-describedby="data_table_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 177px;">Code</th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 100.6px;">
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Office: activate to sort column ascending" style="width: 100.8px;">
                                    IsAmt/Per
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending" style="width: 123.4px;">Value
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending" style="width: 123.4px;">
                                    Amount
                                </th>

                            </tr>
                        </thead>

                        <tbody>




                            @foreach($salaryHead as $ea)
                            @if($ea->head_nature == 'D')
                            
                            @if($ea->salary_head_name == 'EPF' && $employee->salary > 15000)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ea->salary_head_code}}</td>

                                <td>{{$ea->salary_head_name}}</td>
                                <td>{{$ea->amount_and_present}}</td>
                                <td>
                                    <input type="text" id="deduction_percentage_{{$loop->index}}"
                                       value ="0" readonly="readonly"
                                        class="form-control"></td>
                                <td>
                                    <input type="text" name="D_{{$ea->salary_head_name}}"  value ="0" readonly="readonly"
                                        id="deduction_amount_{{$loop->index}}" class="form-control"></td>
                            </tr>
                            @else
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ea->salary_head_code}}</td>

                                <td>{{$ea->salary_head_name}}</td>
                                <td>{{$ea->amount_and_present}}</td>

                                @if($ea->salary_head_name == 'ESIC' && $employee->salary > 21000)
                                <td>
                                    <input type="text" id="deduction_percentage_{{$loop->index}}"
                                        readonly value="0"
                                        class="form-control"></td>
                                <td>
                                    <input type="text" name="D_{{$ea->salary_head_name}}"
                                        id="deduction_amount_{{$loop->index}}" readonly value="0" class="form-control">
                                </td>
                                @else
                                <td>
                                    <input type="text" id="deduction_percentage_{{$loop->index}}"
                                        onchange="calculate_deduction({{ $loop->index  }} , '{{$ea->amount_and_present}}' , 'D')"
                                        class="form-control"></td>
                                <td>
                                    <input type="text" name="D_{{$ea->salary_head_name}}"
                                        id="deduction_amount_{{$loop->index}}" class="form-control">
                                </td>
                                @endif


                            </tr>
                            @endif
                            @endif
                            @endforeach
                            <tr role="row" class="odd">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td>

                                    <input type="text" id="deduction_side" class="form-control" disabled>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center">
               
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
        <button class="btn btn-purple" onclick="reset()">Reset</button>

    </div>
</div>




<script>
    var response = {
        'basic_salary': {{$total_working_salary}},
        'earning_salary': {{$total_working_salary}},
        'deduction_salary': {{$total_working_salary}}
    }

    


    localStorage.setItem('salary', JSON.stringify(response))


    function reset(){
        window.location.href=window.location.href
    }

    var final_salary = {{$total_working_salary}}
    var salary_in_hand = document.getElementById('salary_in_hand');
    var calculate_salary = {{$total_working_salary}}

    var earning_side = document.getElementById('earning_side');
    var deduction_side = document.getElementById('deduction_side');


    function calculate_earning(index, amount, type) {

        var percentage = document.getElementById(`earning_percentage_${index}`)
        var amount = document.getElementById(`earning_amount_${index}`)
        var result = (percentage.value / 100) * final_salary
        amount.value = result
        var emp_salary = JSON.parse(localStorage.getItem('salary'))

        emp_salary.earning_salary += result
        earning_side.value = emp_salary.earning_salary
        localStorage.setItem('salary', JSON.stringify(emp_salary))

        // calculate_salary = parseInt(calculate_salary) + parseInt(result)
        // salary_in_hand.textContent = calculate_salary
        // earning_side.value = (calculate_salary)

    }


    function calculate_deduction(index, amount, type) {

        var percentage = document.getElementById(`deduction_percentage_${index}`)
        var amount = document.getElementById(`deduction_amount_${index}`)
        var result = (percentage.value / 100) * final_salary
        amount.value = result
        var emp_salary = JSON.parse(localStorage.getItem('salary'))
        emp_salary.deduction_salary -= result
        deduction_side.value = emp_salary.deduction_salary

        localStorage.setItem('salary', JSON.stringify(emp_salary))






    }

</script>

@stop

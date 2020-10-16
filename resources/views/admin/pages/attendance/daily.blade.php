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
                        <div class="custom-title">Quick Attendace</div>
                    </div>
                </div>



                <div class="row container mt-3">
                  
                    


                @if($employees)
                <div class="container-fluid">
                    <h4 class="text-center mt-4 mb-4"> Mark Daily Attendace for Employee</h4>
                    <x-alert />
                    <table class="table table-striped container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">EMPID</th>
                                <th scope="col">Name</th>
                                <th>Attendace</th>
                                <th scope="col">Intime</th>
                                <th scope="col">Outtime</th>
                                <th scope="col">Total Work Hours</th>
                                <th scope="col">Overtime</th>
                                <th scope="col">FD/HD</th>




                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)

                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$employee->empoyee_id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>
                                    <select class="form-control" name="work_type">
                                        <option value="P">Present</option>
                                        <option value="A">Absent</option>
                                    </select>
                                </td>

                                <td>
                                    <input type="time" class="form-control" value="10:00" id="in_time">
                                </td>

                                <td>
                                    <input type="time" class="form-control" value="05:00" onchange="calculateTime()"  id="out_time">
                                </td>

                                <td>
                                    <input type="text" value="0" id="work_hours" class="form-control" disabled>
                                </td>

                                <td>
                                    <input type="text" value="0" id="overtime" class="form-control" disabled>
                                </td>

                                <td>
                                    <input type="text" id="work_type" value="0" class="form-control" disabled>
                                </td>

                            </tr>




                            @endforeach
                        </tbody>

                    </table>
                    <button class="btn btn-success mb-4">Save</button>
                </div>
                @endif



            </div>

        </div>
    </div>

</div>

<script src="http://momentjs.com/downloads/moment.min.js"></script>

<script>

    var in_time = document.getElementById('in_time')
    var out_time = document.getElementById('out_time')
    var work_hours = document.getElementById('work_hours')
    var overtime = document.getElementById('overtime')
    var work_type = document.getElementById('work_type')


    function calculateTime(){
        console.log(in_time.value);
        console.log(out_time.value);
        var Intime = moment(in_time.value, "HH:mm:ss");
        var Outtime = moment(out_time.value, "HH:mm:ss");
        work_hours.value = parseInt(Outtime.diff( Intime, "minutes") / 60)
        
        if(work_hours.value >= 8){
            overtime.value = work_hours.value - 7
            work_type.value = 'FD'
        }else{
            work_type.value = 'HD'
        }
    }


    function reload(query, value) {
        let uri = window.location.href.split('?');
        var url = uri[0];
        if (uri.length == 1) {
            window.location.replace(`/admin/daily?${query}=${value}`)
        }
        var query_string = uri[1].split('&')
        var flag = 0;
        for (var i = 0; i < query_string.length; i++) {
            var str = query_string[i];
            if (str.includes(`${query}`)) {
                flag = 1
                query_string[i] = `${query}=${value}`
                break;
            }
        }
        if (flag == 0) {
            var final_query_string = query_string.join('&');
            window.location.replace(url + '?' + final_query_string + `&${query}=${value}`)
            return;
        }

        url += '?'
        var final_query_string = query_string.join('&');
        window.location.replace(url + final_query_string)
    }

    function find_by_company(e) {
        var value = document.getElementById('select_id').value
        reload('company', value)
    }

    function find_by_desgination(e) {
        var value = document.getElementById('select_id_two').value
        reload('designation', value)
    }

</script>


@stop

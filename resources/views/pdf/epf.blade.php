{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}


<h2 style="text-align: center"> Saiinfotechindia.org</h2>



<table style="width:100%">
    <tr role="row">
        <th >Employee ID</th>
        <th >Employee Name</th>

        <th >UAN number</th>
        <th >Base</th>
        <th >NO. WH</th>
        <th >NO. WDS</th>
        <th >Amount charge EMP</th>
        <th>Amount charge GOV</th>
        <th>Total</th>
    </tr>
    <tbody>

     

        @foreach($data as $epf)
        <tr role="row" class="odd">
        <td class="sorting_1">{{$epf->empoyee_id}}</td>
        <td class="sorting_1">{{$epf->name}}</td>
        <td>{{$epf->un_number}}</td>
            <td>{{$epf->salary}}</td>
            <td>{{$epf->number_of_working_hours}}</td>
            <td>{{$epf->working_day_salary}}</td>
            <td>{{$epf->amount_charge_epf_emp}}</td>
            <td>{{$epf->amount_charge_epf_government}}</td>
            <td>{{$epf->total}}</td>
        </tr>

        @endforeach


    </tbody>
  </table>


  <style>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

</style>

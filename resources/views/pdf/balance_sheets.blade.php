<h2 style="text-align: center"> Saiinfotechindia.org</h2>

<table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
role="grid" aria-describedby="data_table_info">
<thead>
    <tr role="row">
        
        <th rowspan="1" colspan="1">Employee ID</th>
        <th rowspan="1" colspan="1">Employee Name</th>
        <th rowspan="1" colspan="1">Basic Salary</th>
        <th rowspan="1" colspan="1">NO. WD</th>
        
        <th rowspan="1" colspan="1">NO. WDS</th>

        <th rowspan="1" colspan="1">EPF</th>
        <th rowspan="1" colspan="1">ESIC</th>
        <th rowspan="1" colspan="1">Net Payment</th>
        <th rowspan="1" colspan="1">Date of Payment</th>


      
</thead>

<tbody>

    @foreach($data as $balance)
    <tr role="row" class="odd">
    <td class="sorting_1">{{$balance->empoyee_id}}</td>
    <td class="sorting_1">{{$balance->name}}</td>
    <td>{{$balance->salary}}</td>
        <td>{{$balance->number_of_working_hours}}</td>
        <td>{{$balance->working_day_salary}}</td>
        <td>{{$balance->epf}}</td>
        <td>{{$balance->esic}}</td>
        <td>{{$balance->net_payment}}</td>
       

    <td>

        @if($balance->date_of_transfer)
        {{$balance->date_of_transfer}}
        @else
    <a href="{{route('add_date_of_payment' , $balance->balance_id)}}" class="btn btn-info btn-sm">Add Date of payment</a>
        @endif
    </td>

    
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

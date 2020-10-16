<h2 style="text-align: center"> Saiinfotechindia.org</h2>

<table id="data_table" class="table table-bordered table-striped dataTable" cellspacing="0"
role="grid" aria-describedby="data_table_info">
<thead>
    <tr role="row">
        
        <th rowspan="1" colspan="1">IP number</th>
        <th rowspan="1" colspan="1">IP Name</th>
       
    
        <th rowspan="1" colspan="1">No of Days for which wages paid/payable during the month </th>
        <th rowspan="1" colspan="1">Total Monthly Wages</th>
        <th rowspan="1" colspan="1">  Reason Code for Zero workings days(numeric only; provide 0 for all other reasons- Click on the link for reference)

        </th>
        <th rowspan="1" colspan="1">Last working day</th>

     

      
</thead>

<tbody>

    @foreach($wages as $wages)
    <tr role="row" class="odd">
        <td>{{$wages->un_number}}</td>
    <td class="sorting_1">{{$wages->name}}</td>
   

        <td>{{$wages->total_days}}</td>
        <td>{{$wages->total_wages}}</td>

        <td>{{$wages->reason_code_zero}}</td>
        <td>{{$wages->last_working_day}}</td>
   


    
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
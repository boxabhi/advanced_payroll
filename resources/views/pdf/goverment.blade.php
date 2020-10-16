<h2 style="text-align: center"> Saiinfotechindia.org</h2>

<table style="width:100%">
    <tr role="row">
        <th>UAN number</th>
        <th>Employee Name</th>
        <th>Final Salary</th>
        <th>Final Salary</th>
        <th>Final Salary</th>
        <th>Final Salary</th>
        <th>12% EPF</th>
        <th>8.33% EPF</th>
        <th>3.67% EPF</th>
        <th>Day</th>
        <th>Day</th>


    </tr>
    <tbody>
        @foreach($data as $epf)
        <tr role="row" class="odd">
            <td class="sorting_1">{{$epf->un_number}}</td>
            <td class="sorting_1">{{$epf->name}}</td>
            <td>{{$epf->salary}}</td>
            <td>{{$epf->salary}}</td>
            <td>{{$epf->salary}}</td>
            <td>{{$epf->salary}}</td>
            <td>{{$epf->epf_amount_one}}</td>
            <td>{{$epf->epf_amount_two}}</td>
            <td>{{$epf->epf_amount_three}}</td>
            <td>0</td>
            <td>0</td>

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

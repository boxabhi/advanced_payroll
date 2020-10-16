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
        <div class="col-xl-12 col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">Title</div>
                        <div class="custom-post-title">Card subtitle goes here</div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('emi.update' , $employee->emi_id)}}" method="POST">
                        <x-alert />
                        {{@csrf_field()}}
                        {{ method_field('PATCH') }}

                        <input type="hidden" name="emp_id" value="{{$employee->id}}">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>EMP ID</label>
                                <input type="text" class="form-control text-uppercase"
                                    placeholder="{{ucfirst($employee->empoyee_id)}}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label>EMP Name</label>
                                <input type="text" class="form-control" placeholder="{{ucfirst($employee->name)}}"
                                    disabled>
                            </div>

                            <div class="col-md-3">
                                <label>EMP Amount taken</label>
                                <input type="text" class="form-control" placeholder="{{ucfirst($employee->amount)}}"
                                    disabled>
                            </div>

                            <div class="col-md-3">
                                <label>EMP will be deducted</label>
                                <input type="text" class="form-control" placeholder="{{ucfirst($employee->amount_to_be_deducted)}}"
                                    disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Deduct/Add</label>

                                <select class="form-control" onchange="show()" name="type" id="type">
                                    <option>Choose</option>

                                    <option value="A">Add</option>
                                    <option value="D">Deduct</option>
                                </select>

                            </div>
                        </div>

                        <div class="row mt-3" id="deduct_amount" style="display: none">
                            <div class="col-lg-6">
                                <label>Amount to be deducted from sallery</label>
                                <input type="number"  name="amount_to_be_deducted" class="form-control">
                            </div>
                        </div>


                        <div class="row mt-3 " id="add_amount" style="display:none;">
                            <div class="col-md-6">
                                <label>Amount you are giving right now</label>
                                <input type="text" name="giving_amount" onchange="find()" id="giving_amount"
                                    class="form-control" placeholder="Amount">
                            </div>
                            <div class="col-md-6">
                                <label>Total amount</label>
                                <input type="text"  id="remaining" class="form-control" disabled
                                    placeholder="Remaining amount">
                            </div>


                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    

                    </form>



                </div>
            </div>
        </div>


    </div>

</div>


<script>


function show(){
    var e = document.getElementById('type');
    var deduct_amount = document.getElementById('deduct_amount')
    var add_amount = document.getElementById('add_amount')

    console.log(e.value);

    if(e.value == 'A'){
        add_amount.style.display = 'block';
        deduct_amount.style.display = 'none';
    }else{
        add_amount.style.display = 'none';
        deduct_amount.style.display = 'block';

    }


}

    var amount = {{$employee->amount}}
    var giving_amount = document.getElementById('giving_amount')
    var remaining = document.getElementById('remaining')


    function find() {


        var adjusted_amount = parseInt(amount) + parseInt(giving_amount.value)
        console.log(adjusted_amount)

        if (Number.isInteger(adjusted_amount)) {
            remaining.value = adjusted_amount
        }

    }

</script>




@stop

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
                        <div class="custom-title">Advance salary payment</div>
                       
                    </div>
                </div>
                <div class="card-body">
                <form action="{{route('emi.store')}}" method="POST">
                    <x-alert />
                    {{@csrf_field()}}

                    <input type="hidden" name="emp_id" value="{{$employee->id}}">
                    <div class="row mb-3">
                    <div class="col-md-4">
                    <input type="text" class="form-control text-uppercase" placeholder="{{ucfirst($employee->empoyee_id)}}" disabled>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ucfirst($employee->name)}}" disabled>
                          </div>
                    </div>
                        <div class="row">

                          <div class="col">
                              <label>Amount</label>
                            <input type="text" name="amount" onchange="find()" id="amount" class="form-control" placeholder="Amount">
                          </div>
                          <div class="col">
                            <label>Installment</label>
                            <input type="text" name="installment"onchange="find()" id="installment" class="form-control" placeholder="Installment">
                          </div>

                          <div class="col">
                            <label>Date of Payment</label>
                            <input type="date" class="form-control" name="payment_date">
                          </div>

                          <div class="col">
                            <label>Per installment amount</label>
                            <input type="text" id="per" class="form-control" placeholder="" disabled>
                          </div>


                        
                        </div>

                        <div class="text-center mt-4">
                        <button class="btn btn-success">Save</button>
                        </div>

                      </form>



                </div>
            </div>
        </div>


    </div>

</div>


<script>

    var amount = document.getElementById('amount')
    var installment = document.getElementById('installment')
    var per = document.getElementById('per');

    function find(){
      
        var amount_installment = parseInt(amount.value) / parseInt(installment.value)
        console.log(amount_installment)
        if(Number.isInteger(amount_installment)){
        per.value = amount_installment
        }

    }


    </script>




@stop

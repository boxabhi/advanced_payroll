<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Emi;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use DB;

class EmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::query();
        $employees
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id' , '=' , 'departments.id')
        ->join('designations', 'employees.department_id' , '=' , 'designations.id')
        ->select('employees.*' , 'companies.company' , 'departments.department' , 'designations.desgination');

        

        if($request->input('company_id') && $request->input('company_id') != 'null'){
           $employees->where('employees.company_id' , $request->input('company_id'));
        }

        if($request->input('department_id') &&  $request->input('department_id') !='null'){
            $employees->where('employees.department_id' , $request->input('department_id'));
        }

        if($request->input('designation_id') && $request->input('designation_id') != 'null' ){
            $employees->where('employees.designation' , $request->input('designation_id'));
        }


        if($request->input('emp_id') && $request->input('emp_id') != 'null' ){
            $employees->where('employees.empoyee_id' , $request->input('emp_id'));
        }

        return view('admin.pages.emi.index' ,[
            'employees' => $employees->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'emp_id' => 'required|unique:emis',
            'amount' => 'required',
            'installment' => 'required',
            'payment_date' => 'required',
        ]);

        $emi = new Emi();
        $emi->emp_id = $request->input('emp_id');
        $emi->amount = $request->input('amount');
        $emi->installment = $request->input('installment');
        $emi->per_installment = $emi->amount /  $emi->installment ;
        $emi->payment_date = $request->input('payment_date');
        $emi->save();
        return redirect()->back()->with('success' , 'EMI created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $employee = Employee::where('empoyee_id' , $id)->first();    
       return view('admin.pages.emi.create' , compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employee = DB::table('employees')
        ->where('employees.empoyee_id', $id)
        ->join('emis', 'employees.id' , '=' , 'emis.emp_id')
        ->select('employees.*' , 'emis.id as emi_id' , 'emis.*')->first();

        
        return view('admin.pages.emi.edit' , compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       


       
        $emi  = Emi::findOrFail($id);
        $type = $request->input('type');

        

        if($type == 'A'){
        $giving_amount = $request->input('giving_amount');
        $emi->amount = $emi->amount +   $giving_amount;
        $emi->save();
        }elseif($type == 'D'){
            if($emi->amount < $request->input('amount_to_be_deducted')){
                return redirect()->back()->with('error' , "Deduction amount can't be greater than debt amount");
            }
            $emi->amount_to_be_deducted = $request->input('amount_to_be_deducted');
            $emi->save();
        }

       

        return redirect()->back()->with('success', 'Amount saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

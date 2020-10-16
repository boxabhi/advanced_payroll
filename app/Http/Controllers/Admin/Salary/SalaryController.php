<?php

namespace App\Http\Controllers\Admin\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\SalaryHead;

use App\Models\EpfReport;
use App\Models\EsicReport;

use App\Models\GovermentReport;

use App\Models\BalanceSheet;
use DB;

use App\models\Emi;
use App\Models\Wages;
class SalaryController extends Controller
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

        return view('admin.pages.salary.index' ,  [
            'employees' => $employees->paginate(20),
        ],); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empy_id = $request->input('empy_id');
        $department_id = $request->input('department_id');

        $employee = Employee::find('empoyee_id' , $empy_id)->first();
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empy_id = $request->input('emp_id');
        $department_id = $request->input('department_id');
        $emp = $request->input('empy_id');

        
        $employee = Employee::where('empoyee_id' , $empy_id)->first();

        
        $id = $employee->id;
        $employee_attendace_absent = Attendance::where('emp_id' , $id)->where('work_type' , 'A')->get(); 
        $employee = Employee::findOrFail($id);
        $salaryHead = SalaryHead::all();

       
        $total_day_count = cal_days_in_month(CAL_GREGORIAN,10,2020);
        $total_working_day = $total_day_count - count($employee_attendace_absent);
        
        $day_absent =  $total_day_count -  $total_working_day;

        $working_salary_by_day = $employee->salary /  $total_day_count;
        $total_working_salary = $working_salary_by_day * ( $total_day_count - count($employee_attendace_absent));
      
        return view('admin.pages.salary.create' , compact('day_absent','total_working_day' , 'total_day_count' , 'total_working_salary' , 'employee'  , 'salaryHead') );
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id)
    {
       

        $employee = DB::table('employees')
        ->where('employees.empoyee_id' , $id)
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id' , '=' , 'departments.id')
        ->join('designations', 'employees.designation' , '=' , 'designations.id')
        ->select('employees.*' , 'employees.id as emp_real_id', 'companies.company' , 'departments.department' , 'designations.desgination')
        ->first();

        
        
        $id = $employee->id;
        $employee_attendace_absent = Attendance::where('emp_id' , $id)->where('work_type' , 'A')->get(); 
        $employee = Employee::findOrFail($id);
        $salaryHead = SalaryHead::all();
       
        $total_day_count = cal_days_in_month(CAL_GREGORIAN,10,2020);
        $total_working_day = $total_day_count - count($employee_attendace_absent);
        
        $working_salary_by_day = $employee->salary /  $total_day_count;
        $total_working_salary = $working_salary_by_day * ( $total_day_count - count($employee_attendace_absent));
      
        $emi = Emi::where('emp_id' , $id)->first();
        $amount_to_be_deducted = 0;
        if($emi){
        $amount_to_be_deducted = $emi->amount_to_be_deducted;
        }


        $emi = Emi::where('emp_id' , $id)->first();
    
        if( $emi && $emi->amount < $emi->amount_to_be_deducted){
            return redirect()->back()->with('error', 'Deduction amount given is greator than amount please correct');
        }


        return view('admin.pages.salary.create' , 
        compact('total_working_day' , 'total_day_count' , 'total_working_salary' ,
                'employee'  , 'salaryHead' , 'amount_to_be_deducted') );
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("ss");
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
        //
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


    public function save_employee_salary_data(Request $request){

        $emp_id = $request->input('emp_id');

    
        $no_of_working_salary = $request->input('no_working_salary');
        $no_of_working_day = $request->input('no_working_day');

        $earning_epf  = $request->input('E_EPF');
        $earning_esic = $request->input('E_ESIC');

        $deduction_epf  = $request->input('D_EPF');
        $deduction_esic = $request->input('D_ESIC');


      

        $epf_report = new EpfReport();
        $epf_report->emp_id = $emp_id;
        $epf_report->working_day_salary = $no_of_working_salary;
        $epf_report->number_of_working_hours = $no_of_working_day;
        $epf_report->amount_charge_epf_emp =  $deduction_epf;
        $epf_report->amount_charge_epf_government = $earning_epf;

        $epf_report->total = $earning_epf +  $deduction_epf; ;

        $epf_report->save();

    
        $esic_report = new EsicReport();
        $esic_report->emp_id = $emp_id;
        $esic_report->number_of_working_hours = $no_of_working_day;
        $esic_report->working_day_salary = $no_of_working_salary;

        $esic_report->amount_charge_esic_emp =  $deduction_esic;
        $esic_report->amount_charge_esic_government = $earning_esic;
        $esic_report->total =  $earning_esic + $deduction_esic;;
        $esic_report->save();


        $epf_goverment = new GovermentReport();

        $epf_goverment->emp_id = $emp_id;
        $epf_goverment->number_of_working_hours = $no_of_working_day;
        $epf_goverment->working_day_salary = $no_of_working_salary;
        $epf_goverment->epf_amount_one = (12 / 100) * $deduction_epf;;

        $twelve_percent_epf =  $epf_goverment->epf_amount_one ;

        $epf_goverment->epf_amount_two =   (8.33 / 100) *   $twelve_percent_epf;
        $epf_goverment->epf_amount_three = (3.67 / 100) * $twelve_percent_epf;
        $epf_goverment->total = 0;

        $epf_goverment->save();
        
        $balance_sheet = new BalanceSheet();
        $balance_sheet->emp_id = $emp_id;
        $balance_sheet->number_of_working_hours = $no_of_working_day;
        $balance_sheet->working_day_salary = $no_of_working_salary;
        $balance_sheet->epf = $deduction_epf ;
        $balance_sheet->esic =  $deduction_esic;

        $balance_sheet->net_payment = $no_of_working_salary - $deduction_epf  - $deduction_esic;
        $balance_sheet->save();



        $wages = new Wages();

        $wages->emp_id = $emp_id;
       $wages->total_days = $no_of_working_day;
       $wages->total_wages =  $balance_sheet->net_payment;
       $wages->reason_code_zero = 0;
       $wages->last_working_day = date('d-m-Y');
       $wages->save();


       $emi = Emi::where('emp_id' , $emp_id)->first();
       
       if($emi){
         $emi->amount = $emi->amount - $emi->amount_to_be_deducted;
         if($emi->amount == 0){
            $emi->delete();
            return redirect()->route('salary.index')->with('success' , 'Data stored Successfully');
         }
         $emi->save();
       }



        return redirect()->route('salary.index')->with('success' , 'Data stored Successfully');
    }



    



}

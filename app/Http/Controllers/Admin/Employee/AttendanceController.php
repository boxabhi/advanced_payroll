<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\models\Company;
use App\models\Department;
use App\Models\Designation;
use App\models\Employee;
use DB;

use DateTime;

class AttendanceController extends Controller
{
     public function index(Request $request){
        
      $employees = Employee::query();
      $employees
      ->join('companies', 'employees.company_id', '=', 'companies.id')
      ->join('departments', 'employees.department_id' , '=' , 'departments.id')
      ->join('designations', 'employees.designation' , '=' , 'designations.id')
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


    

      return view('admin.pages.attendance.index' , 
      ['employees' => $employees->paginate(20),]);
     }

     public function daily(Request $request){
      $companies = Company::all();
      $designations = Designation::all();

      $company_id = '';
      $designation_id = '';

      $company_id = $request->query('company');
      $designation_id = $request->query('designation');

      $employees = Employee::where('company_id', $company_id)->where('designation', $designation_id)->get();
      return view('admin.pages.attendance.daily' , compact('companies' , 'designations' ,'employees'));
   }


     public function mark(Request $request , $id){

        $date = date('Y-m-d');
        // $check = Attendance::where('present_date' , $date)->where('emp_id' , $id)->first();
        // if($check){
        //     return redirect()->back()->with('error', 'Attendance is already marked for this employee');
        // }
        $att = new Attendance();
        $att->emp_id = $id;
        $att->work_type = $request->input('work_type');
        $att->present_date = $date ;
        $att->save();
        return redirect()->back()->with('success', 'Attendance Marked');

     }



     public function mark_detail($id){
      $employee = Employee::findOrFail($id);
      return view('admin.pages.attendance.mark_detail' , compact('employee')); 

     }

     public function mark_detail_post( Request $request,$id){
        $type = $request->input('type');
        $dates_data = $request->input('dates');
       $dates =  explode(',' , $dates_data[0] );
      
      for($i = 0 ; $i < count($dates) ; $i++){
            $att = new Attendance();
            $att->emp_id = $id;
            $att->work_type = $type;
            $att->present_date = $dates[$i];
            $att->save();
      }

      return redirect()->back()->with('success' , 'Attendance marked');

     }


     public function show(Request $request){

      $employees = Employee::query();
      $employees
      ->join('companies', 'employees.company_id', '=', 'companies.id')
      ->join('departments', 'employees.department_id' , '=' , 'departments.id')
      ->join('designations', 'employees.designation' , '=' , 'designations.id')
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
      if($request->input('from_date') && $request->input('from_date') != 'null' ){
         $from = $request->input('from_date');
         $to = $request->input('to_date');
         $attendance_data = Attendance::whereBetween('present_date' ,[$from , $to])->get();
      }
      $employees->where('employees.empoyee_id' , $request->input('from_date'));
      return view('admin.pages.attendance.show');
     }


     public function att_summary(Request $request){

        $attendance_data = Attendance::query();
        $attendance_data
        ->join('employees', 'attendances.emp_id', '=', 'employees.id')
        ->select('employees.*' , 'attendances.*');
        $holidays = 0;
        $diff = 0;
        if($request->input('from_date') && $request->input('from_date') != 'null' ){

            $from = $request->input('from_date');
            $to = $request->input('to_date');
           

            $date1=date_create($from);
            $date2=date_create($to);
            $diff=date_diff($date1,$date2);
            $diff = ($diff->days);
            
            $attendance_data->whereBetween('present_date' , [$from , $to])->where('work_type' , 'P')->get();

            $holidays = DB::table('leave_calendars')->whereBetween('date_for_holiday' , [$from , $to])->count();
        }

        if($request->input('company_id') && $request->input('company_id') != 'null' ){
            $attendance_data->where('employees.company_id' , $request->input('company_id'));
           
        }

        if($request->input('department_id') && $request->input('department_id') != 'null' ){
            $attendance_data->where('department_id' , $request->input('department_id'));
        }

        
        if($request->input('designation_id') && $request->input('designation_id') != 'null' ){
            $attendance_data->where('designation_id' , $request->input('designation_id'));
        }


        if($request->input('emp_id') && $request->input('emp_id') != 'null' ){
            $attendance_data->where('emp_id' , $request->input('emp_id'));
        }

        //dd($attendance_data->select('employees.*', DB::raw('count(*) as total'))->groupby('emp_id')->get());

        return view('admin.pages.attendance.summary' ,
        ['attendance_data' => $attendance_data->select('employees.*', DB::raw('count(*) as total'))->groupby('emp_id')->get()]
        ,compact('attendance_data' , 'holidays' , 'diff'));
     }


}



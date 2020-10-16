<?php

namespace App\Http\Controllers\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Company;
use App\models\Department;
use App\Models\Designation;

use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      //  dd($request->all());


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


        //dd($request->all());

        //dd($employees->get());
        
      

        return view('admin.pages.employee.index' ,
        [
            'employees' => $employees->paginate(20),
        ],
        
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $designations = Designation::all();
        $departments = Department::all();
        
         return view('admin.pages.employee.create', compact('companies' , 'designations' , 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function generateRandomString($sh , $length = 5) {
        
        $id =  (rand(1000,9999));

        $emp = Employee::where('empoyee_id' , $id )->get();
        if(count($emp)){
            $this->generateRandomString($sh);
        }

        return $id;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_joining' => 'required',

            'name' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',

            'father_name' => 'required',
            'mother_name' => 'required',

            
            'permanent_address' => 'required',
            'mobile' => 'required',

            'qualification' => 'required',
           
            'photo' => 'mimes:jpg,jpeg,png|max:1024',
            'signature' => 'mimes:jpg,jpeg,png|max:1024',
            'adhar_number' => 'required',
            'pan_number' => 'required',

            'account_number' => 'required',
            'bank_name' => 'required',
            'bank_ifsc' => 'required',
            
            'company_name' => 'required',
            'designation_name' => 'required',

            'salary' => 'required',

         ]);

         $company = Company::find($request->input('company_name'));

         $employee = new Employee();
         $employee->empoyee_id = $company->short_code. '-' . $this->generateRandomString($company->short_code);
         $employee->name = $request->input('name');
         $employee->dob = $request->input('dob');
         $employee->marital_status = $request->input('marital_status');
         $employee->father_name = $request->input('father_name');
         $employee->mother_name = $request->input('mother_name');


        
         $employee->permanent_address = $request->input('permanent_address');
         $employee->mobile = $request->input('mobile');
         $employee->alternate = $request->input('alternate');
         $employee->wife_of = $request->input('wife_of');

         $employee->guardian_mobile = $request->input('guardian_name');
         $employee->father_occupation = $request->input('father_occupation');

         $employee->correspondence_address = $request->input('corrspondence_address');
        
        
       
        
        
       
        $employee->nominee_name = $request->input('nominee');
        $employee->nominee_relation = $request->input('nominee_relation');
        $employee->nominee_mobile = $request->input('nominee_mobile');

        $employee->qualification = $request->input('qualification');

        if ($request->file('photo')) {
            $imageName = time().'.'.request()->photo->getClientOriginalExtension();
             request()->photo->move(public_path('asset/employee/photo/'), $imageName);
             $employee->photo       = $imageName;
            
         }


         if ($request->file('signature')) {
            $imageName = time().'.'.request()->signature->getClientOriginalExtension();
             request()->signature->move(public_path('asset/employee/signature/'), $imageName);
             $employee->signature_image       = $imageName;
            
         }


        $employee->adhar_number = $request->input('adhar_number');
        if ($request->file('adhar_image')) {
            $imageName = time().'.'.request()->adhar_image->getClientOriginalExtension();
             request()->adhar_image->move(public_path('asset/employee/adhar/'), $imageName);
             $employee->adhar_image       = $imageName;
            
         } 

        $employee->pan_number = $request->input('pan_number');
        if ($request->file('pan_image')) {
            $imageName = time().'.'.request()->pan_image->getClientOriginalExtension();
             request()->pan_image->move(public_path('asset/employee/pan/'), $imageName);
             $employee->pan_image       = $imageName;
            
         } 

        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
        $employee->bank_ifsc = $request->input('bank_ifsc');

        $employee->company_id = $request->input('company_name');
        $employee->department_id = $request->input('department_id');

        $employee->designation = $request->input('designation_name');
         $employee->date_of_joining = $request->input('date_of_joining');
         $employee->salary = $request->input('salary');
         $employee->un_number = $request->input('uan_number');
        $employee->save();
        return redirect()->back()->with('success','Employee created successfully');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')
        ->where('employees.empoyee_id' , $id)
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id' , '=' , 'departments.id')
        ->join('designations', 'employees.designation' , '=' , 'designations.id')
       
        ->select('employees.*', 'companies.company' , 'departments.department' , 'designations.desgination')
 
        ->first();
        
        
        return view('admin.pages.employee.show' ,compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}

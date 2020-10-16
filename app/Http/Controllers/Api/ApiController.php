<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Response;






class ApiController extends Controller
{


    public function company(){
        $companies = Company::all();
        return Response::json($companies);
    }


    public function department($id){
        $department = Department::where('company_id' , $id)->orWhere('company_id', 0)->get();
        return Response::json($department);
    }

    public function designation($id){

        $designation = Designation::where('department_id' , $id)->get();
        return Response::json($designation);
    }

    public function employee($company_id , $department_id , $designation){
        $employee = Employee::where('company_id' , $company_id)->where('designation' , $designation )->get();
        return Response::json($employee);
    }


    public function short_code($value){
        $company = Company::where('short_code' , $value)->get();
        if(count($company)){
            return Response::json(['result' => true]);
        }else{
            return Response::json(['result' => false]);
        }
    }


}

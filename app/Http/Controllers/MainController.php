<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Employee;
use App\models\Department;
use App\models\Designation;
use App\models\Company;

class MainController extends Controller
{
    public function index(){

        return view('front.pages.home');
    }


    public function admin(){

        $company = Company::all()->count();
        $department = Department::all()->count();
        $designation = Designation::all()->count();
        $employee = Employee::all()->count();

        return view('index' , compact('company','department', 'designation', 'employee'));
    }
}

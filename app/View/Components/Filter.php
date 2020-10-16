<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\models\Company;
use App\models\Department;
use App\Models\Designation;

class Filter extends Component
{
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        
        $companies = Company::all();
        $departments = Department::all();
        $designations = Designation::all();
        return view('components.filter' ,  compact( 'companies' ,'departments' , 'designations'));
    }
}

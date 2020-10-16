<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.pages.company.index' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.company.create');
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
            'company' => 'required|unique:companies',
            'logo' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $company = new Company();
        if ($request->file('logo')) {
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
             request()->logo->move(public_path('asset/company/logo'), $imageName);
             $company->logo       = $imageName;
            
         } 

         if ($request->file('file')) {
            $imageName = time().'.'.request()->file->getClientOriginalExtension();
             request()->file->move(public_path('asset/company/files'), $imageName);
             $company->file       = $imageName;
            
         } 

        $company->company = $request->input('company');
        $company->email = $request->input('email');
        $company->address = $request->input('address');
        $company->short_code = $request->input('short_code');

        $short_code = Company::where('short_code' ,  $company->short_code )->get();

        if(count($short_code)){
            return redirect()->back()->with('error', 'This short is already takem try '. $company->short_code.'-123' );

        }

        $company->save();
        return redirect()->back()->with('success', 'Company created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

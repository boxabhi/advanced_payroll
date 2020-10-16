<?php

namespace App\Http\Controllers;

use App\Models\SalaryHead;
use Illuminate\Http\Request;

class SalaryHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pages.salaryhead');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.salaryhead.create');
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
            'salary_head_code' => 'required',
            'salary_head_name' => 'required',
            'head_nature' => 'required',
            'amount_and_present' => 'required',
        ]);

        $salaryHead = new SalaryHead();
        $salaryHead->salary_head_code = $request->get('salary_head_code');
        $salaryHead->salary_head_name = $request->get('salary_head_name');
        $salaryHead->head_nature = $request->get('head_nature');
        $salaryHead->amount_and_present = $request->get('amount_and_present');
        $salaryHead->remarks = $request->get('remarks');
        $salaryHead->save();
        return redirect()->back()->with('success','Salary head created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryHead  $salaryHead
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryHead $salaryHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryHead  $salaryHead
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryHead $salaryHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryHead  $salaryHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryHead $salaryHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryHead  $salaryHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryHead $salaryHead)
    {
        //
    }
}

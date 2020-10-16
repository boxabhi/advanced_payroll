<?php

namespace App\Http\Controllers;

use App\Models\LeaveCalendar;
use Illuminate\Http\Request;

class LeaveCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $holidays  = LeaveCalendar::orderBy('date_for_holiday' ,'ASC')->get();
        return view('admin.pages.calendar.create' , compact('holidays'));
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
            'holiday' => 'required',
            'holiday_date' => 'required',
        ]);

        $holiday = new LeaveCalendar();
        $holiday->holiday = $validatedData['holiday'];
        $holiday->date_for_holiday = $validatedData['holiday_date'];
        $holiday->save();
        return redirect()->back()->with('success', 'Holiday created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveCalendar  $leaveCalendar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $leaveCalendar = LeaveCalendar::findOrFail($id);
       $leaveCalendar->delete();
       return redirect()->back()->with('warning', 'Holiday Deleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveCalendar  $leaveCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveCalendar $leaveCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveCalendar  $leaveCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveCalendar $leaveCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveCalendar  $leaveCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveCalendar $leaveCalendar)
    {
        dd("dd");
    }
}

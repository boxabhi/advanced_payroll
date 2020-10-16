<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\BalanceSheet;
use Illuminate\Http\Request;
use App\Models\EpfReport;
use App\Models\EsicReport;
use DB;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
class EpfReportController extends Controller
{
    
    public function index(){
        return view('admin.pages.reports.index');
    }


    public function epf(){
        $epf = DB::table('epf_reports')
            ->join('employees', 'epf_reports.emp_id', '=', 'employees.id')
            ->select('epf_reports.*', 'employees.*')
            ->get();

        return view('admin.pages.reports.epf' , compact('epf'));
    }


    public function esic(){
      
        //$esic = EsicReport::all();

        $esic = DB::table('esic_reports')
        ->join('employees', 'esic_reports.emp_id', '=', 'employees.id')
        ->select('esic_reports.*', 'employees.*')
        ->get();

       
        return view('admin.pages.reports.esic' , compact('esic'));
    }


    public function balanceReport(){
        $balances =  DB::table('balance_sheets')
        ->join('employees', 'balance_sheets.emp_id', '=', 'employees.id')
        ->select('balance_sheets.*', 'employees.*' , 'balance_sheets.id as balance_id')
        ->get();
       

        return view('admin.pages.reports.balance_sheet' , compact('balances'));
    }


    



    public function government(){

        $government = DB::table('goverment_reports')
        ->join('employees', 'goverment_reports.emp_id', '=', 'employees.id')
        ->select('goverment_reports.*', 'employees.*')
        ->get();
       
        return view('admin.pages.reports.government' , compact('government'));

    }


    public function department(){

        $government = DB::table('goverment_reports')
        ->join('employees', 'goverment_reports.emp_id', '=', 'employees.id')
        ->select('goverment_reports.*', 'employees.*')
        ->get();
       
        return view('admin.pages.reports.government' , compact('government'));

    }



    public function wages(){

        $wages = DB::table('wages')
        ->join('employees', 'wages.emp_id', '=', 'employees.id')
        ->select('wages.*', 'employees.*')
        ->get();

        return view('admin.pages.reports.wages' , compact('wages'));

    }


    public function export_wages_pdf(){
        $options    =   new Options();
        $options->set('enable_html5_parser', true);
        $wages = DB::table('wages')
        ->join('employees', 'wages.emp_id', '=', 'employees.id')
        ->select('wages.*', 'employees.*')
        ->get();

        view()->share('pdf.epf',$wages);
        $pdf = PDF::loadView('pdf.wages', array('wages' =>$wages));
        return $pdf->download('data.pdf');


        
   
    }


    public function export_epf_pdf(){
        $options    =   new Options();
        $options->set('enable_html5_parser', true);
        $data = DB::table('epf_reports')
        ->join('employees', 'epf_reports.emp_id', '=', 'employees.id')
        ->select('epf_reports.*', 'employees.*')
        ->get(); 
     
        view()->share('pdf.epf',$data);
        $pdf = PDF::loadView('pdf.epf', array('data' =>$data));
        return $pdf->download('data.pdf');

    }



    
    public function export_esic_pdf(){
        $options    =   new Options();
        $options->set('enable_html5_parser', true);
        $data = DB::table('esic_reports')
        ->join('employees', 'esic_reports.emp_id', '=', 'employees.id')
        ->select('esic_reports.*', 'employees.*')
        ->get();     
        view()->share('pdf.esic',$data);
        $pdf = PDF::loadView('pdf.esic', array('data' =>$data));
        return $pdf->download('data.pdf');
    }


    public function export_goverment_pdf(){
        $options    =   new Options();
        $options->set('enable_html5_parser', true);
        $data = DB::table('goverment_reports')
        ->join('employees', 'goverment_reports.emp_id', '=', 'employees.id')
        ->select('goverment_reports.*', 'employees.*')
        ->get();   
        view()->share('pdf.goverment',$data);
        $pdf = PDF::loadView('pdf.goverment', array('data' =>$data));
        return $pdf->download('governmentdata.pdf');
    }


    public function export_balance_sheet_pdf(){
        $options    =   new Options();
        $options->set('enable_html5_parser', true);
        $data = DB::table('balance_sheets')
        ->join('employees', 'balance_sheets.emp_id', '=', 'employees.id')
        ->select('balance_sheets.*', 'employees.*')
        ->get();   
        view()->share('pdf.balance_sheets',$data);
        $pdf = PDF::loadView('pdf.balance_sheets', array('data' =>$data));
        return $pdf->download('balance_sheets.pdf');
    }



    public function add_date_of_payment(Request $request , $id){
      
      

        if($request->isMethod('post')){
           
            $date = $request->input('date_of_payment');
            $data =BalanceSheet::where('id',$id)->first();
            $data->date_of_transfer = $date;
            $data->save();
            return redirect()->back()->with('sucess' , ' Date of transfer added');
        }else{

        $data = DB::table('balance_sheets')->where('id',$id)->first();
        return view('admin.pages.reports.add_date_of_payment' , compact('data'));
        }

    }







    public function export_goverment_excel(){
        return Excel::download(new DataExport , 'government.xlsx');
    }

}



class DataExport implements FromCollection{

    function collection(){
        $data = DB::table('goverment_reports')
        ->join('employees', 'goverment_reports.emp_id', '=', 'employees.id')
        ->select('employees.un_number' , 'employees.name' ,
        'goverment_reports.working_day_salary' , 'goverment_reports.working_day_salary',
        'goverment_reports.working_day_salary' , 'goverment_reports.working_day_salary' , 
        'goverment_reports.epf_amount_one' , 'goverment_reports.epf_amount_two',
        'goverment_reports.epf_amount_three'
        )
        ->get();   
       return $data;
    }

    
 
 }
 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use PDF;

class EmployeeController extends Controller
{
    //
    public function showEmployees(){
        $employee = Employees::all();
        return view('index', compact('employee'));
    }


    public function createPdf(){
        $data = Employees::all();

        view()->share('employee', $data);
        $pdf = PDF::loadView('pdf_view', $data);

        return $pdf->download('pdf_file.pdf');
    }
}



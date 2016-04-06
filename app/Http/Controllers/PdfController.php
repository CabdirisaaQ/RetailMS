<?php

namespace Retailms\Http\Controllers;

use Illuminate\Http\Request;

use Retailms\Http\Requests;

class PdfController extends Controller
{
    
        public function invoice($record,$reportName,$reportType,$total=NULL) 
        {
            
           // $reportName = 'Z-report-' . date('d-m-Y h:m:s');
           // $reportType = 'pdf.ZReport';
            //dd($reportType);

            $data = $record;
            $date = date('d-m-Y h:m:s');
            $voucherNo = "2222";
            $view =  \View::make($reportType, compact('data', 'date', 'invoice','total'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            $pdf->download($reportName);
            return $pdf->stream($reportName);
        }
     
        public function setData($record) 
        {
            /*$data =  [
                'quantity'      => '1' ,
                'description'   => 'some ramdom text',
                'price'   => '500',
                'total'     => '500'
            ];*/
            return $record;
        }
}

<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Dompdf\Dompdf;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome',
            'date' => date('m/d/Y')
        ];
        return view('myPDF', $data);
        // $html=view('myPDF', $data);
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($html);
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $dompdf->stream();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Product;

class PdfGeneratorController extends Controller
{
    function index()
    {
        $pdf = PDF::loadView('htmltopdf');

        // download pdf file
        return $pdf->download('pdfview.pdf');
    }
}

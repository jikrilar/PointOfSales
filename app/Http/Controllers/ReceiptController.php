<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        return view('receipt.index');
    }

    public function generatePDF()
    {
        $dompdf = new Dompdf();
        $html = view('path.to.your.view')->render(); // Path ke file HTML receipt
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('receipt.pdf', ['Attachment' => 0]);
    }
}

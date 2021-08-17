<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;

class PdfController extends Controller
{
    public function geraPdf(Request $request){

        $path = base_path('public/img/LogoPEB-colorido.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $modelo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf',compact('modelo'));
        return $pdf->setPaper('a4')->stream('Clientes.pdf');
    }
}

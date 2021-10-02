<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\AceptReservation;
use App\Models\View;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $aceptreservations = AceptReservation::whereBetween('date', [$fi, $ff])->get();
        $total = $aceptreservations->sum('pay');
        return view('file', compact('aceptreservations', 'total'));
        
    }
    public function exportPdf()
    {
        
        $aceptreservations = AceptReservation::get();
        view()->share('aceptreservations', $aceptreservations);
        $pdf = PDF::loadView('pdf.reservation', $aceptreservations);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Reportes-Varadero.pdf');
          
    }
   



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

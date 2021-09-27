<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\AceptReservation;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $aceptreservations = AceptReservation::all();
        // $precioTotal=0;
        // foreach($aceptreservations as $item){
        //     $precioTotal += $item['pay'];
        // }
        // $aceptreservations = AceptReservation::get();
        // $pdf = PDF::loadView('pdf.reservation', compact('aceptreservations'));
        // $pdf->setPaper('a4', 'landscape');
        // return $pdf->download('reportes.pdf');
        $aceptreservations = AceptReservation::all();
        return view('file')->with('aceptreservations', $aceptreservations);
        
    }
    public function exportPdf()
    {
        // $aceptreservations = AceptReservation::get();
        // $pdf = PDF::loadView('pdf.reservation', compact('aceptreservations'));
        // $pdf->setPaper('a4', 'landscape');
        // return $pdf->download('reportes.pdf');
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

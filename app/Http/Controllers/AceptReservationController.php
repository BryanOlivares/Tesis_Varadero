<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\AceptReservation;
use Illuminate\Http\Request;

class AceptReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AceptReservation::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aceptreservation=new AceptReservation;
        $aceptreservation->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AceptReservation  $aceptReservation
     * @return \Illuminate\Http\Response
     */
    public function show(AceptReservation $aceptReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AceptReservation  $aceptReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AceptReservation $aceptReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AceptReservation  $aceptReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(AceptReservation $aceptReservation)
    {
        //
    }
}

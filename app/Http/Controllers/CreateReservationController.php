<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CreateReservation;
use App\Models\Reservation;
use App\Http\Requests\CreateReservationStoreRequest;
use App\Models\Service;
use App\Models\User;
use App\Models\AceptReservation;
use Illuminate\Http\Request;


class CreateReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $user = Auth::user()->id;
        return $createreservation=CreateReservation::where('user_id', $user)->get();
        //return CreateReservation::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReservationStoreRequest $request)
    {
        $createreservation=new CreateReservation;
        $createreservation->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateReservation  $createReservation
     * @return \Illuminate\Http\Response
     */
    public function show(CreateReservation $createreservation)
    {
        //return CreateReservation::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateReservation  $createReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateReservation $createreservation)
    {
        $createreservation->update($request->all());
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateReservation  $createReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateReservation $createreservation)
    {
        $createreservation->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $idsCentres = array();
        $centres = auth()->user()->professionel->centres;
        foreach($centres as $c){
            $idsCentres[] = $c->id;

        }
        $reservations = Reservation::whereIn('idcentre',$idsCentres)->OrderBy('updated_at','DESC')->get();
        return view('professionels.reservations.liste')->with('reservations',$reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $Reservation = new Reservation();
        $Reservation->idpatient = auth()->user()->patient->id;
        $Reservation->idcentre = $request->input('idcentre');
        $Reservation->detaille = $request->input('detaille');
        $Reservation->date = $request->input('datereservation');
        $Reservation->etat= "En Cours";
        $Reservation->save();
        return redirect()->back();

        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function AccepterReservation($id){
        $reservation = Reservation::find($id);
        $reservation->etat = "Accepter";
        $reservation->update();
        return redirect()->back();
    }
    public function RefuserReservation($id){
        $reservation = Reservation::find($id);
        $reservation->etat = "Refuser";
        $reservation->update();
        return redirect()->back();
    }
}

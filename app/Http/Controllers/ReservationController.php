<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('clients.reservation',compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_place'=>'required|integer'
        ]);
        $reservation = new Reservation();
        $reservation->nombre_place=$request->nombre_place;
        $reservation->evenement_id=$request->evenement_id;
        $reservation->user_id=$request->user_id;
        $reservation->date_reservation=date('Y/m/d');
        if($reservation->save()){
            return redirect('/dashboardClient');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Reservation $reservation,string $etat)
    {
        $reservation->est_accepter_ou_pas='decliner';
        $reservation->save();
        $idreservation=$reservation->id;
        return Redirect::route('listeReservation',['id'=>$idreservation]);
        
    }

    public function updateReservation(Reservation $reservation,string $etat)
    {
        $reservation->est_accepter_ou_pas='accepter';
        $reservation->save();
        $idreservation=$reservation->id;
        return Redirect::route('listeReservation',['id'=>$idreservation]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

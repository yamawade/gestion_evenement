<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements= Evenement::all();
        return view('association.listeEvenement',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('association.detailEvenement',compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evenement = Evenement::find($id);
        return view('association.modifierEvenement', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle'=>'required|string',
            'date_limite_inscription'=>'required|date',
            'description'=>'required|string',
            'image'=>'required|image|max:5000',
            'lieu'=>'required|string',
            'date_evenement'=>'required|date',
        ]);

        $evenement = Evenement::find($id);
        $evenement->libelle=$request->libelle;
        $evenement->date_limite_inscription=$request->date_limite_inscription;
        $evenement->description=$request->description;
        $evenement->lieu=$request->lieu;
        $evenement->est_cloturer_ou_pas=$request->est_cloturer_ou_pas;
        $evenement->date_evenement=$request->date_evenement;
        $evenement->association_id=$request->association_id;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/images'), $filename);
            $evenement['image']= $filename;
        }
        $evenement->update();
        $idevenement=$evenement->id;
        return Redirect::route('detailEvenement',['id'=>$idevenement]);

        // if ($evenement->update()) {

        //     //return 'success';
        //     return redirect('/listeEvenement');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evenement = Evenement::find($id);
        $evenement->delete();
        return redirect('/listeEvenement');
    }
}

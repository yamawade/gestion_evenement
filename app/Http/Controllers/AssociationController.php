<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AssociationController extends Controller
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
    public function create()
    {
        return view('association.registerAssociation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $association= new Association();
        $request->validate([
            'nom_association'=>'required|min:2|max:20 ',
            'slogan_association'=>'required |min:2|max:20',
            'logo'=>'required|image|max:5000',
            'email'=>'required|email',
            'password'=>'required',
            'date_creation'=>'required|date',
        ]);
        $association->nom_association=$request->nom_association;
        $association->slogan_association=$request->slogan_association;
        $association->email=$request->email;
        $association->date_creation=$request->date_creation;
        $association->password=Hash::make($request->password);
        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $association['logo']= $filename;
        }
        if ($association->save()) {
            //return 'success';
            return redirect('/connexionAssociation');
        }
    }
    public function login(){
        return view('auth.loginAssociation');
    }
    public function authenticate(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $test=auth()->guard('association')->attempt($credentials);
        //dd($test);
        if ($test) {
            // Authentification réussie
            // $user = auth()->guard('association')->user();
            // dd($user->nom_association);
            // return $user->nom_association;
            return redirect('/dashboardAssociation');
        }
       
        // if (auth()->guard('association')->attempt($credentials)) {
        //     // Authentification réussie
        //     //return redirect('/dashboardAssociation');
        //     $nomAssos= auth()->user()->nom_association;
        //     return $nomAssos;
        // }

        // Authentification échouée
        return back()->withErrors('Email et/ou mot de passe incorrect !');
    }

    public function logout(){
        auth()->logout();
        return redirect('/connexionAssociation');
    }

    //AJOUT EVENEMENT
    public function ajout_evenement(Request $request){
        $request->validate([
            'libelle'=>'required|string',
            'date_limite_inscription'=>'required|date',
            'description'=>'required|string',
            'image'=>'required|image|max:5000',
            'lieu'=>'required|string',
            'date_evenement'=>'required|date',
        ]);

        $evenement = new Evenement();
        $evenement->libelle=$request->libelle;
        $evenement->date_limite_inscription=$request->date_limite_inscription;
        $evenement->description=$request->description;
        $evenement->lieu=$request->lieu;
        $evenement->date_evenement=$request->date_evenement;
        $evenement->association_id=$request->association_id;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/images'), $filename);
            $evenement['image']= $filename;
        }
        //$image=$request->file('image')->store('/images','public');

        if ($evenement->save()) {
            //return 'success';
            return redirect('/listeEvenement');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservations = Reservation::where('evenement_id',$id)->get();
        return view('association.listeReservation',compact('reservations'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

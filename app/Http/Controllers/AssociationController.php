<?php

namespace App\Http\Controllers;

use App\Models\Association;
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
        // $request->validate([
        //     'nom_association'=>'required|min:2|max:20 ',
        //     'slogan_association'=>'required |min:2|max:20',
        //     'logo'=>'required|image|max:1000',
        //     'email'=>'required|email',
        //     'password'=>'required',
        //     'date_creation'=>'required|date',
        // ]);
        $association->nom_association=$request->nom_association;
        $association->slogan_association=$request->slogan_association;
        $association->email=$request->email;
        $association->date_creation=$request->date_creation;
        $association->logo=$request->logo;
        $association->password=Hash::make($request->password);
        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/images'), $filename);
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

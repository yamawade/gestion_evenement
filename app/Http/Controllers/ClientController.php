<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        return view('clients.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user= new User();
        $request->validate([
            'nom'=>'required|min:2|max:20 ',
            'prenom'=>'required |min:2|max:20',
            'telephone'=>'required |min:2|max:20',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->telephone=$request->telephone;
        $user->save();
       // return 'good';
        if ($user->save()) {
            return redirect('/ConnexionClient');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
           
            return redirect('/dashboardClient');
        }
        
        return back()->withErrors('email et/ou mot de passe incorrect !!!!');
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
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

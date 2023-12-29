<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('auth.index', ["users" => User::all()]);
    }

    public function login() : View
    {
        return view('auth.login');
    }

    public function doLogin(LoginFormRequest $request)
    {
        if(Auth::attempt($request->validated()))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('fail', 'L\'authentification a échouée. Veuillez vérifier votre email et votre mot de passe.')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route("accueil.home");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('auth.new', ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterFormRequest $request)
    {
            $user = User::create([
                'nomUtilisateur' => $request->input('nomUtilisateur'),
                'mailUtilisateur' => $request->input('mailUtilisateur'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->route('login')->with('success', 'Inscription réussie !');
    }

    /**
     * Display the specified resource.
     */
    public function show(): View
    {
        return view('auth.show', ['user' => Auth::user()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterFormRequest $request)
    {
        $user = Auth::user();
        $user->update([
            'nomUtilisateur' => $request->input('nomUtilisateur'),
            'mailUtilisateur' => $request->input('mailUtilisateur'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('auth.show', ['user' => $user->id])->with('success', 'L\'utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('auth.index', ["users" => User::all()])->with('success', 'L\'utilisateur a bien été supprimé');;
    }
}

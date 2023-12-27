<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('users.index', ["users" => User::all()]);
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

        return back()->with('fail', 'Les informations d\'identification ne sont pas bon')->onlyInput('email');
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
    public function store(LoginFormRequest $request)
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
    public function show(User $user): View
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoginFormRequest $request, User $user)
    {
        $user = User::create([
            'nomUtilisateur' => $request->input('nomUtilisateur'),
            'mailUtilisateur' => $request->input('mailUtilisateur'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'L\'utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index', ["users" => User::all()])->with('success', 'L\'utilisateur a bien été supprimé');;
    }
}

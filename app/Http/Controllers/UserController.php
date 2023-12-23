<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('users.index', ["users" => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('users.new', ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $user = User::create([
            'nom' => $request->input('nomUtilisateur'),
            'prenom' => $request->input('mailUtilisateur'),
            'age' => $request->input('passwordUtilisateur'),
        ]);

        return redirect()->route('users.index', ["users" => User::all()])->with('success', 'L\'utilisateur a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.printOne', ['user' => $user]);
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
    public function update(UserFormRequest $request, User $user)
    {
        $user->update([
            'nom' => $request->input('nomUtilisateur'),
            'prenom' => $request->input('mailUtilisateur'),
            'age' => $request->input('passwordUtilisateur'),
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

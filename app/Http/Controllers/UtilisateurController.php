<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Role;

class UtilisateurController extends Controller
{
    public function index()
    {
        $this->authorize('admin_view');
        $data = User::all();
        return view('utilisateurs.utilisateurs',compact('data'));
    }

    public function edit(User $user)
    {
        $this->authorize('admin_view');

        $data = Role::all();

        return view('utilisateurs.modifierUtilisateur' ,compact('data','user'));
    }

    public function update(User $user)
    {
        $this->authorize('admin_view');
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_number'=> 'required|numeric|digits:8',
            'address'=> 'required|string|max:255',
            'role_id' => 'required|numeric',
        ]);

        $user->update($data);

        session()->flash('flash_true','Utilisateur modifié avec succès!');
        return redirect('/utilisateurs');
    }

    public function destroy(User $user)
    {
        $this->authorize('admin_view');
        $user->delete();

        session()->flash('flash_true','Utilisateur supprimé avec succès!');
        return redirect('/utilisateurs');
    }

}

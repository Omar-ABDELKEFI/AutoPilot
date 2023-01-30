<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function edit()
    {
        return view('profile.modifierProfile',);
    }

    public function update()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $data= request()->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_number'=> 'required|numeric|digits:8',
            'address'=> 'required|string|max:255',
        ]);
        $user->update($data);

        session()->flash('flash_true','Vos données de profil ont été modifié avec succès!');
        return redirect('/profil');

    }

    public function editPassword()
    {
        return view('profile.changerMdp',);
    }

    public function updatePassword()
    {
        $user = User::find(Auth::user()->id);
        $dataPassword = $this->validatedPassword();
        if (Hash::check($dataPassword["current_password"],Auth::user()->password))
        {
            $user->update([
                "password" =>  Hash::make($dataPassword["new_password"]),
            ]);
            session()->flash('flash_true','Votre mot de passe a été modifié avec succès!');
            return redirect('/profil');
        }
        else
        {
            session()->flash('flash_false',"Le mot de passe actuel incorrect! Vérifiez que c'est le bon");
            return redirect('/profil/change-password');
        }
    }

    protected function validatedPassword()
    {
        return request()->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8|different:current_password',
        ]);        
    }
}

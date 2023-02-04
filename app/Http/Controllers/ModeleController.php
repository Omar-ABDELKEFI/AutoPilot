<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\VehiculeModele;
use \App\Models\Constructeur;

class ModeleController extends Controller
{
    public function index()
    {
        $data = VehiculeModele::with('constructeur','vehicule')->get();
        return view('modeles.modeles',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $data = Constructeur::all();
        return view('modeles.ajouterModele',compact('data'));
    }

    public function store()
    {
        $this->authorize('admin_view');

        VehiculeModele::create($this->validatedData());

        session()->flash('flash_true','Le modele a été ajouté avec succès!');
        return redirect('/modeles');
    }

    public function edit(VehiculeModele  $modele)
    {
        $this->authorize('admin_view');

        $data = Constructeur::all();

        return view('modeles.modifierModele' ,compact('data','modele'));
    }

    public function update(VehiculeModele $modele)
    {
        $this->authorize('admin_view');

        $modele->update($this->validatedData());

        session()->flash('flash_true','Le modele a été modifié avec succès!');
        return redirect('/modeles');
    }

    public function destroy(VehiculeModele $modele)
    {
        $this->authorize('admin_view');
        $modele->delete();

        session()->flash('flash_true','Le modele a été supprimé avec succès!');
        return redirect('/modeles');
    }


    public function validatedData(){
        return request()->validate([
            'Idconstructeur' => 'required|not_in:0',
            'Nom_Modele' => 'required',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Chauffeur;
use \App\Models\PermisConduiteType;

class ChauffeurController extends Controller
{
    public function index()
    {
        $data = Chauffeur::with('typePermis')->get();
        return view('chauffeurs.chauffeurs',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $data = PermisConduiteType::all();
        return view('chauffeurs.ajouterChauffeur',compact('data'));
    }

    public function store()
    {   
        $this->authorize('admin_view');

        Chauffeur::create($this->validatedData());

        session()->flash('flash_true','Le chauffeur a été ajouté avec succès!');
        return redirect('/chauffeurs');
    }

    public function edit(Chauffeur  $chauffeur)
    {
        $this->authorize('admin_view');
        $data = PermisConduiteType::all();
        return view('chauffeurs.modifierChauffeur' ,compact('data','chauffeur'));
    }

    public function update(Chauffeur $chauffeur)
    {
        $this->authorize('admin_view');

        $chauffeur->update($this->validatedData());

        session()->flash('flash_true','Le chauffeur a été modifié avec succès!');
        return redirect('/chauffeurs');
    }

    public function destroy(Chauffeur $chauffeur)
    {
        $this->authorize('admin_view');
        $chauffeur->delete();

        session()->flash('flash_true','Le chauffeur a été supprimé avec succès!');
        return redirect('/chauffeurs');
    }


    protected function validatedData()
    {
        return request()->validate([
            'Nom_chauffeur' => 'required|string',
            'Prenom_chauffeur' => 'required|string',
            'Adresse' => 'required|string',
            'Numpermis' => 'required|numeric|gt:0',
            'IdtypeConduite' => 'required|not_in:0',
            'Telephone' => 'required|numeric|gt:0|digits:8',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Constructeur;

class ConstructeurController extends Controller
{
    public function index()
    {
        $data = Constructeur::with('vehicule')->get();
        $eee = "abc123";
        return view('constructeurs.constructeurs',compact('data','eee'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('constructeurs.ajouterConstructeur');
    }
    
    public function store()
    {
        $this->authorize('admin_view');

        Constructeur::create($this->validatedData());

        session()->flash('flash_true','Le constructeur a été ajouté avec succès!');
        return redirect('/constructeurs');
    }

    public function edit(Constructeur $constructeur)
    {
        $this->authorize('admin_view');
        return view('constructeurs.modifierConstructeur', compact('constructeur'));
    }

    public function update(Constructeur $constructeur)
    {
        $this->authorize('admin_view');

        $constructeur->update(request()->validate([
            'Nom_constructeur' => 'required|unique:constructeurs,Nom_constructeur,'.$constructeur->Idconstructeur.',Idconstructeur',
        ]));

        session()->flash('flash_true','Le constructeur a été modifié avec succès!');
        return redirect('/constructeurs');

    }

    public function destroy(Constructeur $constructeur)
    {
        $this->authorize('admin_view');
        if($constructeur->modele->count() == 0){
            $constructeur->delete() ;
            session()->flash('flash_true','Le constructeur a été supprimé avec succès!');
            return redirect('/constructeurs');
        }
        else{
            session()->flash('flash_false','Vous ne pouvez pas supprimer un constructeur qui possède deja un modèle');
            return redirect('/constructeurs');
        }
        
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Nom_constructeur' => 'required|unique:constructeurs',
        ]);
    }
}

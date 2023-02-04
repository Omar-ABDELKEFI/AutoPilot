<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\CarburantFournisseur;

class FournisseursCarburantController extends Controller
{
    public function index()
    {
        $data = CarburantFournisseur::all();
        return view('fournisseursCarburant.fournisseursCarburant',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('fournisseursCarburant.ajouterFournisseurCarburant');
    }
    
    public function store()
    {
        $this->authorize('admin_view');

        CarburantFournisseur::create($this->validatedData());

        session()->flash('flash_true','Le fournisseur a été ajouté avec succès!');
        return redirect('/fournisseurs-carburant');
    }

    public function edit(CarburantFournisseur $fournisseur)
    {
        $this->authorize('admin_view');
        return view('fournisseursCarburant.modifierFournisseurCarburant', compact('fournisseur'));
    }

    public function update(CarburantFournisseur $fournisseur)
    {
        $this->authorize('admin_view');

        $fournisseur->update($this->validatedEditedData($fournisseur));

        session()->flash('flash_true','Le fournisseur a été modifié avec succès!');
        return redirect('/fournisseurs-carburant');

    }

    public function destroy(CarburantFournisseur $fournisseur)
    {
        $this->authorize('admin_view');
        $fournisseur->delete();

        session()->flash('flash_true','Le fournisseur a été supprimé avec succès!');
        return redirect('/fournisseurs-carburant');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Nom_Fournisseur' => 'required|unique:carburant_fournisseurs',
        ]);
    }

    protected function validatedEditedData(CarburantFournisseur $fournisseur)
    {
        return request()->validate([
            'Nom_Fournisseur' => 'required|unique:carburant_fournisseurs,Nom_Fournisseur,"'.$fournisseur->IdFournisseur.'",IdFournisseur',
        ]);
    }
}

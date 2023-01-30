<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\CarburantFournisseur;
use \App\Models\Vehicule;
use \App\Models\Carburant;
use \App\Models\CarburantCarte;

class CartesCarburantController extends Controller
{
    public function index()
    {
        $data = CarburantCarte::with('fournisseur','vehicule','carburant')->get();
        return view('cartesCarburant.cartesCarburant',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $dataV = Vehicule::all();
        $dataC = Carburant::all();
        $dataF = CarburantFournisseur::all();
        return view('cartesCarburant.ajouterCartesCarburant',compact('dataV','dataC','dataF'));
    }

    public function store()
    {   
        $this->authorize('admin_view');

        CarburantCarte::create($this->validatedData());

        session()->flash('flash_true','La carte carburant a été ajouté avec succès!');
        return redirect('/cartes-carburant');
    }

    public function edit(CarburantCarte  $carte)
    {
        $this->authorize('admin_view');
        $dataV = Vehicule::all();
        $dataC = Carburant::all();
        $dataF = CarburantFournisseur::all();
        return view('cartesCarburant.modifierCartesCarburant' ,compact('dataV','dataC','dataF','carte'));
    }

    public function update(CarburantCarte  $carte)
    {
        $this->authorize('admin_view');
        $carte->update($this->validatedEditedData($carte));

        session()->flash('flash_true','La carte carburant a été modifié avec succès!');
        return redirect('/cartes-carburant');
    }

    public function destroy(CarburantCarte  $carte)
    {
        $this->authorize('admin_view');
        $carte->delete();
        session()->flash('flash_true','La carte carburant a été supprimé avec succès!');
        return redirect('/cartes-carburant');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Numcarte' => 'required|numeric|unique:carburant_cartes',
            'IdFournisseur' => 'required|not_in:0',
            'Typecarte' => 'required',
            'Idvehicule' => 'required|not_in:0',
            'Idcarburant' => 'required|not_in:0',
        ]);
    }

    protected function validatedEditedData(CarburantCarte $carte)
    {
        return request()->validate([
            'Numcarte' => 'required|numeric|unique:carburant_cartes,Numcarte,"'.$carte->Idcarte.'",Idcarte',
            'IdFournisseur' => 'required|not_in:0',
            'Typecarte' => 'required',
            'Idvehicule' => 'required|not_in:0',
            'Idcarburant' => 'required|not_in:0',
        ]);
    }
}

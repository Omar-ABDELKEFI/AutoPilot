<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Carburant;

class TypesCarburantController extends Controller
{
    public function index()
    {
        $data = Carburant::all();
        return view('typesCarburant.typesCarburant',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('typesCarburant.ajouterTypesCarburant');
    }
    
    public function store()
    {
        $this->authorize('admin_view');

        Carburant::create($this->validatedData());

        session()->flash('flash_true','Le type de carburant a été ajouté avec succès!');
        return redirect('/types-carburant');
    }

    public function edit(Carburant $carburant)
    {
        $this->authorize('admin_view');
        return view('typesCarburant.modifierTypesCarburant', compact('carburant'));
    }

    public function update(Carburant $carburant)
    {
        $this->authorize('admin_view');

        $carburant->update($this->validatedEditedData($carburant));

        session()->flash('flash_true','Le type de carburant a été modifié avec succès!');
        return redirect('/types-carburant');

    }

    public function destroy(Carburant $carburant)
    {
        $this->authorize('admin_view');
        $carburant->delete();

        session()->flash('flash_true','Le type de carburant a été supprimé avec succès!');
        return redirect('/types-carburant');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Nomcarburant' => 'required|string|unique:carburants',
            'Prixunitaire' => 'required|numeric|gt:0',
        ]);
    }

    protected function validatedEditedData(Carburant $carburant)
    {
        return request()->validate([
            'Nomcarburant' => 'required|string|unique:carburants,Nomcarburant,"'.$carburant->Idcarburant.'",Idcarburant',
            'Prixunitaire' => 'required|numeric|gt:0',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\VehiculeType;

class TypesVehiculeController extends Controller
{
    public function index()
    {
        $data = VehiculeType::with('vehicule')->get();
        return view('typesVehicule.typesVehicule',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('typesVehicule.ajouterTypesVehicule');
    }
    
    public function store()
    {
        $this->authorize('admin_view');
        $data = request()->validate([
            'Nomtypevehicule' => 'required|string|unique:vehicule_types',
            'Coefficientconskm' => 'required|numeric|gt:0',
        ]);

        VehiculeType::create($data);

        session()->flash('flash_true','Le type de vehicule a été ajouté avec succès!');
        return redirect('/types-vehicule');
    }

    public function edit(VehiculeType $typeVehicule)
    {
        $this->authorize('admin_view');
        return view('typesVehicule.modifierTypesVehicule', compact('typeVehicule'));
    }

    public function update(VehiculeType $typeVehicule)
    {
        $this->authorize('admin_view');
        $data = request()->validate([
            'Nomtypevehicule' => 'required|string|unique:vehicule_types,Nomtypevehicule,"'.$typeVehicule->Idtypevehicule.'",Idtypevehicule',
            'Coefficientconskm' => 'required|numeric|gt:0',
        ]);
        
        $typeVehicule->update($data);
        session()->flash('flash_true','Le type de vehicule a été modifié avec succès!');
        return redirect('/types-vehicule');

    }

    public function destroy(VehiculeType $typeVehicule)
    {
        $this->authorize('admin_view');
        $typeVehicule->delete();

        session()->flash('flash_true','Le type de vehicule a été supprimé avec succès!');
        return redirect('/types-vehicule');
    }
}

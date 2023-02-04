<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Vehicule;
use \App\Models\Constructeur;
use \App\Models\VehiculeModele;
use \App\Models\VehiculeType;
use \App\Models\Chauffeur;
use \App\Models\Carburant;
use \App\Models\Voyage;

class VehiculeController extends Controller
{
    public function index()
    {
        $data = Vehicule::with('modele','typeVehicule','carburant','chauffeur')->get();
        foreach($data as $v){
            $voyage = Voyage::where('Idvehicule',$v->Idvehicule)->orderBy('Datedepart','DESC')->first();
            if (($voyage != null)){
                $v->Idchauffeur = $voyage->Idchauffeur;
                if($v->CompteurFinal < $voyage->Compteurarrivee)
                    $v->CompteurFinal = $voyage->Compteurarrivee;
                $v->save();
                $v->refresh();
            }
        }
        return view('vehicules.vehicules',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $dataM = VehiculeModele::all();
        $dataT = VehiculeType::all();
        $dataC = Carburant::all();
        $dataCh = Chauffeur::all();
        return view('vehicules.ajouterVehicule',compact('dataC','dataM','dataT','dataCh'));
    }

    public function store()
    {   
        $this->authorize('admin_view');

        Vehicule::create($this->validatedData());

        session()->flash('flash_true','Le vehicule a été ajouté avec succès!');
        return redirect('/vehicules');
    }

    public function edit(Vehicule  $vehicule)
    {
        $this->authorize('admin_view');
        $dataM = VehiculeModele::all();
        $dataT = VehiculeType::all();
        $dataC = Carburant::all();
        $dataCh = Chauffeur::all();

        return view('vehicules.modifierVehicule' ,compact('dataC','dataM','dataT','dataCh','vehicule'));
    }

    public function update(Vehicule $vehicule)
    {
        $this->authorize('admin_view');

        $vehicule->update($this->validatedEditedData($vehicule));

        session()->flash('flash_true','Le vehicule a été modifié avec succès!');
        return redirect('/vehicules');
    }

    public function destroy(Vehicule $vehicule)
    {
        $this->authorize('admin_view');
        $vehicule->delete();

        session()->flash('flash_true','Le vehicule a été supprimé avec succès!');
        return redirect('/vehicules');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Num_immatriculation' => 'required|unique:vehicules',
            'Numcartegris' => 'required|unique:vehicules',
            'IdModele' => 'required|not_in:0',
            'Idtypevehicule' => 'required|not_in:0',
            'Idcarburant' => 'required|not_in:0',
            'CompteurFinal' => 'required|numeric|gt:0',
            'CompteurDernierVidange' => 'required|numeric',
            'Etat' => 'required|string',
            'Idchauffeur' => 'nullable',
        ]);
    }

    protected function validatedEditedData(Vehicule $vehicule)
    {
        return request()->validate([
            'Num_immatriculation' => 'required|unique:vehicules,Num_immatriculation,"'.$vehicule->Idvehicule.'",Idvehicule',
            'Numcartegris' => 'required|unique:vehicules,Numcartegris,"'.$vehicule->Idvehicule.'",Idvehicule',
            'IdModele' => 'required|not_in:0',
            'Idtypevehicule' => 'required|not_in:0',
            'Idcarburant' => 'required|not_in:0',
            'CompteurFinal' => 'required|numeric|gt:0',
            'CompteurDernierVidange' => 'required|numeric',
            'Etat' => 'required|string',
            'Idchauffeur' => 'nullable',
        ]);
    }
}

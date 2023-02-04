<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Voyage;
use \App\Models\Chauffeur;
use \App\Models\Vehicule;
use \App\Models\Destination;


class VoyageController extends Controller
{
    public function index()
    {
        $data = Voyage::with('chauffeur','vehicule','destination')->get();
        return view('voyages.voyages',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $dataC = Chauffeur::all();
        $dataV = Vehicule::with('modele')->get();
        $dataD = Destination::all();
        return view('voyages.ajouterVoyage',compact('dataC','dataV','dataD'));
    }

    public function store()
    {
        $this->authorize('admin_view');

        $data = $this->validatedData();

        $vehicule = Vehicule::with('typeVehicule')->where('Idvehicule',$data['Idvehicule'])->first();

        if( (( $data['Quantitecarburant']/($data['Compteurarrivee'] - $data['CompteurDepart']) ) * 100) <= $vehicule->typeVehicule->Coefficientconskm ){
            $data['Prime'] = 15;
        }else{
            $data['Prime'] = 0;
        }

        Voyage::create($data);

        session()->flash('flash_true','Voyage ajouté avec succès!');
        return redirect('/voyages');
    }

    public function edit(Voyage $voyage)
    {
        $this->authorize('admin_view');

        $dataC = Chauffeur::all();
        $dataV = Vehicule::with('modele')->get();
        $dataD = Destination::all();

        return view('voyages.modifierVoyage' ,compact('dataC','dataV','dataD','voyage'));
    }

    public function update(Voyage $voyage)
    {
        $this->authorize('admin_view');

        $data = $this->validatedData();
        $data['Prime'] = request('Prime');

        $voyage->update($data);

        session()->flash('flash_true','Voyage modifié avec succès!');
        return redirect('/voyages');
    }

    public function destroy(Voyage $voyage)
    {
        $this->authorize('admin_view');
        $voyage->delete();

        session()->flash('flash_true','Voyage supprimé avec succès!');
        return redirect('/voyages');
    }


    public function validatedData(){
        return request()->validate([
            'Idchauffeur' => 'required|not_in:0',
            'Idvehicule' => 'required|not_in:0',
            'Datedepart' => 'required',
            'Heuredepart' => 'required',
            'Datearrivee' => 'required',
            'Heurearrivee' => 'required',
            'CompteurDepart' => 'required|numeric|gt:0',
            'Compteurarrivee' => 'required|numeric|gt:0',
            'Quantitecarburant' => 'required|numeric|gt:0',
            'Iddestination' => 'required|not_in:0',
        ]);
    }
}

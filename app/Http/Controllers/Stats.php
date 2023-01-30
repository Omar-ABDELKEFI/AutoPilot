<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ConsommationsCarburantFacture;
use \App\Models\Vehicule;
use \App\Models\Carburant;
use \App\Models\Chauffeur;
use \App\Models\Voyage;
use \App\Models\Prime;
use DateTime;

class Stats extends Controller
{
    public function consommationsVehicules()
    {
        $date = request('mois');

        $vehicules = Vehicule::with('modele','typeVehicule','carburant')->get();
        foreach($vehicules as $v){
            $v['kms']= 0;
            $v['quantite']= 0;
            $v['montant']= 0;
        }
        
        $data = ConsommationsCarburantFacture::with('carte')->get();
        foreach($vehicules as $v){
            $factures = $data->whereBetween('DateConsommation',[request('mois')."-00",request('mois')."-31"])
                ->where('carte.Idvehicule',$v->Idvehicule);
            foreach($factures as $f){
                $v['quantite'] += $f['QuantiteCarburant'];
                $v['montant'] += $f['Montant'];
            }
        }


        $data_comparai = array();
        $chauffeurs_data = array();
        $voyages = Voyage::with('chauffeur','vehicule','destination')->get()
            ->whereBetween('Datedepart',[request('mois')."-00",request('mois')."-31"]);

        $factures = ConsommationsCarburantFacture::with('carte')->get()
            ->whereBetween('DateConsommation',[request('mois')."-00",request('mois')."-31"]);

        if ($date != ""){
        foreach($voyages as $v)
        {
            $a= array();
            foreach($factures as $f)
            {
                if( ($f->DateConsommation == $v->Datedepart) && ($f->carte->Idvehicule == $v->Idvehicule) )
                {
                    array_push($a,[
                        'date' => $f->DateConsommation,
                        'immatriculation' => $v->vehicule->Num_immatriculation,
                        'coef_vehicule' => $v->vehicule->typeVehicule->Coefficientconskm,
                        'carte_km_debut' => $f->CompteurInitial,
                        'carte_km_fin' => $f->CompteurFinal,
                        'carte_total_f_d' => $f->CompteurFinal - $f->CompteurInitial,
                        'carte_quantite' => $f->QuantiteCarburant,
                        'carte_taux' => number_format(($f->QuantiteCarburant/($f->CompteurFinal - $f->CompteurInitial)) * 100, 2),
                        'voyage_km_debut' => $v->CompteurDepart,
                        'voyage_km_fin' => $v->Compteurarrivee,
                        'voyage_total_f_d' => $v->Compteurarrivee - $v->CompteurDepart,
                        'voyage_quantite' => $v->Quantitecarburant,
                        'voyage_taux' => number_format(($v->Quantitecarburant/($v->Compteurarrivee - $v->CompteurDepart)) * 100, 2),
                        'chauffeur' => $v->chauffeur->Idchauffeur,
                        'prime' => $v->Prime,
                    ]);
                }
            }
            if (count($a) == 1)
            {
                array_push($data_comparai,$a[0]);
            } 
            elseif (count($a) > 1)
            {
                $final = $a[0];
                for($i=1; $i < count($a); $i++){
                    if ($a[$i]['carte_km_debut'] < $final['carte_km_debut'])
                        $final['carte_km_debut'] = $a[$i]['carte_km_debut'];

                    if ($a[$i]['carte_km_fin'] > $final['carte_km_fin'])
                        $final['carte_km_fin'] = $a[$i]['carte_km_fin'];

                    $final['carte_quantite'] += $a[$i]['carte_quantite'];
                    $final['carte_total_f_d'] += $a[$i]['carte_total_f_d'];
                }
                array_push($data_comparai,$final);
            }
        }
        }
        $chauffeurs_data = Chauffeur::all();
        return view('stats.consommationsVehicules',compact('vehicules','data_comparai','chauffeurs_data','date'));
    }

    public function consommationsCarburants()
    {
        $carburants = Carburant::all();
        foreach($carburants as $c){
            $c['quantite']= 0;
            $c['montant']= 0;
        }

        $data = ConsommationsCarburantFacture::with('carte')->get();

        foreach($carburants as $c){
            $factures = $data->whereBetween('DateConsommation',[request('mois')."-00",request('mois')."-31"])
                ->where('carte.Idcarburant',$c->Idcarburant);
            foreach($factures as $f){
                $c['quantite'] += $f['QuantiteCarburant'];
                $c['montant'] += $f['Montant'];
            }
        }

        $date = request('mois');

        return view('stats.consommationsCarburants',compact('carburants','date'));
    }

    public function consommationsChauffeurs()
    {
        $chauffeurs = Chauffeur::all();
        foreach($chauffeurs as $ch){
            $ch['quantite']= 0;
            $ch['nb_voyage']= 0;
            $ch['km_parcourus']= 0;
        }

        $data = Voyage::all();

        foreach($chauffeurs as $ch){
            $voyages = $data->whereBetween('Datedepart',[request('mois')."-00",request('mois')."-31"])
                ->where('Idchauffeur',$ch->Idchauffeur);
            foreach($voyages as $v){
                $ch['quantite'] += $v['Quantitecarburant'];
                $ch['nb_voyage'] += 1;
                $ch['km_parcourus'] += ($v['Compteurarrivee'] - $v['CompteurDepart']);
            }
        }

        $date = request('mois');

        return view('stats.consommationsChauffeurs',compact('chauffeurs','date'));
    }

    public function primes()
    {
        $date = request('mois');
        $chauffeurs_data = array();

        if ($date != ""){

            $chauffeurs_data = Chauffeur::all();
            $data = Voyage::all()->whereBetween('Datedepart',[request('mois')."-00",request('mois')."-31"]);

            foreach($chauffeurs_data as $ch){
                $ch['voyages'] = 0;
                $ch['voyage_primes'] = 0;
                $ch['prime'] = 0;
            }
            foreach($chauffeurs_data as $ch){
                foreach($data as $x){
                    if ($x->Idchauffeur == $ch->Idchauffeur){
                        $ch['voyages'] += 1;
                        if ($x->Prime != 0){
                            $ch['voyage_primes'] += 1;
                            $ch['prime'] += $x['Prime'];
                        }

                    }
                }
            }
        }
        return view('stats.primes',compact('chauffeurs_data','date'));
    }
    
    public function send_data(Request $request){
        $primes_chauffeurs = $request->input('data')['chauffeurs'];
        $date = $request->input('data')['mois'];
        $primes = Prime::with('chauffeur')->get()
            ->whereBetween('date',[$date."-00",$date."-31"]);

        if ( $primes->isEmpty() ){
            foreach($primes_chauffeurs as $ch){
                $data['date'] = $date."-01";
                $data['Idchauffeur'] = $ch['Idchauffeur'];
                $data['prime'] = $ch['prime'];
                $data['nb_voyage'] = $ch['voyages'];
                $data['nb_voyage_prime'] = $ch['voyage_primes'];
                Prime::create($data);   
            }
            session()->flash('flash_true','Les primes ont été enregistrer avec succès!');
            return redirect('/stats/primes');
        } else {
            session()->flash('flash_false','Les primes ont deja été enregistrer. Pas la peine de le refaire!');
            return redirect('/stats/primes');
        }
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

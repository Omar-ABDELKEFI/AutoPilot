<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Imports\ConsommationsCarburantFactureImport;
use \App\Models\ConsommationsCarburantFacture;
use \App\Models\CarburantCarte;
use Excel;

class ConsommationsCarburantFactureController extends Controller
{
    public function index()
    {
        $data = ConsommationsCarburantFacture::with('carte')->get();
        return view('factures.factures',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        $data = CarburantCarte::with('fournisseur')->get();
        return view('factures.ajouterFacture',compact('data'));
    }

    public function store()
    {
        $this->authorize('admin_view');
        $v = $this->validatedData();
        $v['annee'] = date("Y", strtotime($v["DateConsommation"]));
        ConsommationsCarburantFacture::create($v);

        session()->flash('flash_true','Facture ajouté avec succès!');
        return redirect('/factures');
    }
    
    public function edit(ConsommationsCarburantFacture $facture)
    {
        $this->authorize('admin_view');
        $data = CarburantCarte::with('fournisseur')->get();
        return view('factures.modifierFacture',compact('facture','data'));
    }

    public function update(ConsommationsCarburantFacture $facture)
    {
        $this->authorize('admin_view');
        $v = $this->validatedData();
        $v['annee'] = date("Y", strtotime($v["DateConsommation"]));
        $facture->update($v);

        session()->flash('flash_true','Facture modifié avec succès!');
        return redirect('/factures');
    }

    public function import()
    {
        $this->authorize('admin_view');
        return view('factures.import');
    }

    public function storeImport(Request $request)
    {
        $this->authorize('admin_view');
        Excel::import(new ConsommationsCarburantFactureImport,$request->file('file'),null,\Maatwebsite\Excel\Excel::CSV);
        session()->flash('flash_true','Factures importé avec succès!');
        return redirect('/factures');
    }

    public function destroy(ConsommationsCarburantFacture $facture)
    {
        $this->authorize('admin_view');
        $facture->delete();

        session()->flash('flash_true','Facture supprimé avec succès!');
        return redirect('/factures');
    }

    public function validatedData()
    {
        return request()->validate([
            'Idcarte' => 'required|not_in:0',
            'DateConsommation' => 'required',
            'HeureConsommation' => 'required',
            'CompteurInitial' => 'required',
            'CompteurFinal' => 'required',
            'QuantiteCarburant' => 'required',
            'Prixuni' => 'required',
        ]);
    }
}

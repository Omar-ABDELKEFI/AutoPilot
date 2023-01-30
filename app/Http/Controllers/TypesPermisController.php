<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\PermisConduiteType;

class TypesPermisController extends Controller
{
    public function index()
    {
        $data = PermisConduiteType::with('chauffeur')->get();
        return view('typesPermis.typesPermis',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('typesPermis.ajouterTypePermis');
    }
    
    public function store()
    {
        $this->authorize('admin_view');

        PermisConduiteType::create($this->validatedData());

        session()->flash('flash_true','Le type de permis a été ajouté avec succès!');
        return redirect('/types-permis');
    }

    public function edit(PermisConduiteType $permis)
    {
        $this->authorize('admin_view');
        return view('typesPermis.modifierTypePermis', compact('permis'));
    }

    public function update(PermisConduiteType $permis)
    {
        $this->authorize('admin_view');

        $permis->update($this->validatedEditedData($permis));

        session()->flash('flash_true','Le type de permis a été modifié avec succès!');
        return redirect('/types-permis');

    }

    public function destroy(PermisConduiteType $permis)
    {
        $this->authorize('admin_view');
        $permis->delete();

        session()->flash('flash_true','Le type de permis a été supprimé avec succès!');
        return redirect('/types-permis');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Nom_type_permis' => 'required|unique:permis_conduite_types',
        ]);
    }

    protected function validatedEditedData(PermisConduiteType $permis)
    {
        return request()->validate([
            'Nom_type_permis' => 'required|unique:permis_conduite_types,Nom_type_permis,"'.$permis->IdtypeConduite.'",IdtypeConduite',
        ]);
    }
}

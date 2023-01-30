<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Destination;

class DestinationController extends Controller
{
    public function index()
    {
        $data = Destination::all();
        return view('destinations.destinations',compact('data'));
    }

    public function create()
    {
        $this->authorize('admin_view');
        return view('destinations.ajouterDestination');
    }
    
    public function store()
    {
        $this->authorize('admin_view');

        Destination::create($this->validatedData());

        session()->flash('flash_true','Destination ajouté avec succès!');
        return redirect('/destinations');
    }

    public function edit(Destination $destination)
    {
        $this->authorize('admin_view');
        return view('destinations.modifierDestination', compact('destination'));
    }

    public function update(Destination $destination)
    {
        $this->authorize('admin_view');

        $destination->update(request()->validate([
            'Nom_destination' => 'required|unique:destinations,Nom_destination,'.$destination->Iddestination.',Iddestination',
        ]));

        session()->flash('flash_true','Destination modifié avec succès!');
        return redirect('/destinations');

    }

    public function destroy(Destination $destination)
    {
        $this->authorize('admin_view');
        $destination->delete();

        session()->flash('flash_true','Destination supprimé avec succès!');
        return redirect('/destinations');
    }

    
    protected function validatedData()
    {
        return request()->validate([
            'Nom_destination' => 'required|unique:destinations',
        ]);
    }
}

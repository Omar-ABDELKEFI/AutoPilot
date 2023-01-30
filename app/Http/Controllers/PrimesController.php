<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Prime;

class PrimesController extends Controller
{
    public function index()
    {
        $date = request('mois');
        $data = array();
        if ($date != ""){
            $data = Prime::with('chauffeur')->get()
                ->whereBetween('date',[request('mois')."-00",request('mois')."-31"]);
        }
        return view('primes.primesSaved',compact('data','date'));
    }

    public function edit(Prime $prime)
    {
        $this->authorize('admin_view');
        $prime = Prime::with('chauffeur')->where('id_prime', $prime->id_prime)->first();

        return view('primes.modifierPrimeSaved' ,compact('prime'));
    }

    public function update(Prime $prime)
    {
        $this->authorize('admin_view');

        $prime->update($this->validatedData());

        session()->flash('flash_true','La prime a été modifié avec succès!');
        return redirect('/primes');
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
            'prime' => 'required',
        ]);
    }
}

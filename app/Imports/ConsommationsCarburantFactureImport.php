<?php

namespace App\Imports;

use App\Models\ConsommationsCarburantFacture;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \App\Models\CarburantCarte;

class ConsommationsCarburantFactureImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        
        return new ConsommationsCarburantFacture([
            'Idcarte' => CarburantCarte::where('Numcarte',$row["num_carte"])->first()->Idcarte ?? NULL,
            'DateConsommation' => date("Y-m-d",strtotime(str_replace("/","-",$row["date"]))),
            'HeureConsommation' => $row["heure"],
            'annee' => date("Y",strtotime(str_replace("/","-",$row["date"]))),
            'CompteurInitial' => $row["kilometres_avant"],
            'CompteurFinal' => $row["kilometres"],
            'QuantiteCarburant' => $row["quantite"],
            'Prixuni' => $row["prix_unitaire"],
        ]);
    }
}

@extends('template')

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('js-code')
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables-primes.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
        let table2 = document.querySelector('#table2');
        let dataTable2 = new simpleDatatables.DataTable(table2);
    </script>
@endsection

@section('content-heading-title','Suivi des consommations mensuel par vehicule')
@section('content-heading-description','Suivi mensuel des consommations de carburant,
 des dépenses reliés et le total de km parcourus des vehicules de la société ')
@section('content-heading-path','Statistiques et suivi')
@section('content-heading-title-content','Suivi des consommations mensuel par vehicule')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Suivi des consommations mensuel par vehicule
            </div>

            <div class="card-header">
                <form class="form" action="/stats/consommations-vehicules" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-1">
                            <label for="dateInput">Date:</label>
                        </div>
                        <div class="d-flex col-md-4 col-12">
                        <input class="form-control me-1 mb-1" type="month" id="dateInput" name="mois" 
                            max="{{Carbon\Carbon::now()->format('Y-m')}}" value="{{$date}}">
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                            Confirmer
                        </button>
                        </div>
                    </div>
                </form>
                @if ($date =='') 
                <div> 
                <h4 style="color:red;"> Veuillez insérer une date specifique pour voir les statistiques concernée</h4> 
                </div> 
                @endif
            </div>
            
            <div class="card-body">
                @if (Session::has('flash_true'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>
                            {{Session::get('flash_true')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
                @endif
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                            role="tab" aria-controls="home" aria-selected="true">Suivi des consommations mensuel par vehicule</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                            role="tab" aria-controls="profile" aria-selected="false">Consommation de carburant et comparaison entre facture et voyage</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Numéro d'immatriculation</th>
                            <th>Modèle</th>
                            <th>Constructeur</th>
                            <th>Type du vehicule</th>
                            <th>Type du carburant</th>
                            <th>Quantité de carburant total</th>
                            <th>Montant total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($date !='')
                        @foreach ($vehicules as $row)
                        <tr>
                            <td>{{$row->Num_immatriculation}}</td>
                            <td>{{$row->modele->Nom_Modele}}</td>
                            <td>{{$row->modele->constructeur->Nom_constructeur}}</td>
                            <td>{{$row->typeVehicule->Nomtypevehicule}}</td>
                            <td>{{$row->carburant->Nomcarburant}}</td>
                            <td style="background-color: #04aa43db;color: white;">
                                {{$row->quantite}}
                            </td>
                            <td style="background-color: #04AA6D;color: white;">
                                {{$row->montant}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <table class="table table-striped table-bordered " id="table2">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th rowspan="2">Immatriculation</th>
                                    <th rowspan="2">Coef</th>
                                    <th colspan="5">Informations facture</th>
                                    <th colspan="5">Informations voyage</th>
                                    <th rowspan="2">Chauffeur</th>
                                    <th rowspan="2">Primes</th>
                                </tr>
                                <tr>
                                    <th>Km debut</th>
                                    <th>Km fin</th>
                                    <th>Total de Km</th>
                                    <th>Quantité</th>
                                    <th>Taux</th>
                                    <th>Km debut</th>
                                    <th>Km fin</th>
                                    <th>Total de Km</th>
                                    <th>Quantité</th>
                                    <th>Taux</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($date !='')
                                @foreach ($data_comparai as $row)
                                
                                <tr>
                                    <td>{{$row['date']}}</td>
                                    <td>{{$row['immatriculation']}}</td>
                                    <td>{{$row['coef_vehicule']}}</td>
                                    <td>{{$row['carte_km_debut']}}</td>
                                    <td>{{$row['carte_km_fin']}}</td>
                                    <td>{{$row['carte_total_f_d']}}</td>
                                    <td>{{$row['carte_quantite']}}</td>
                                    <td>{{$row['carte_taux']}}</td>
                                    <td>{{$row['voyage_km_debut']}}</td>
                                    <td>{{$row['voyage_km_fin']}}</td>
                                    <td>{{$row['voyage_total_f_d']}}</td>
                                    <td>{{$row['voyage_quantite']}}</td>
                                    <td>{{$row['voyage_taux']}}</td>
                                    <td>{{$chauffeurs_data->where('Idchauffeur',$row['chauffeur'])->first()->nom_et_prenom()}}</td>
                                    <td>{{$row['prime']}}</td>
                                    
                                </tr>
                                
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
@endsection

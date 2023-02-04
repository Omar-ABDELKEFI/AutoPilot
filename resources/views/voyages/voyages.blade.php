@extends('template')

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('js-code')
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection

@section('content-heading-title','Voyages')
@section('content-heading-description','Liste des voyages')
@section('content-heading-path','Gestion des voyages')
@section('content-heading-title-content','Voyages')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Liste des voyages  
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
                @can('admin_view')
                <a href="/voyages/ajouter" class="btn btn-success">Ajouter</a>
                @endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Idnetifiant voyage</th>
                            <th>Chauffeur</th>
                            <th>Vehicule</th>
                            <th>Date depart</th>
                            <th>Heure depart</th>
                            <th>Date arrivé</th>
                            <th>Heure arrivé</th>
                            <th>Année</th>
                            <th>Compteur depart</th>
                            <th>Compteur arrivée</th>
                            <th>Quantité carburant consommé</th>
                            <th>Destination</th>
                            <th>Prime</th>
                            @can('admin_view')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{$row->IdVoyage}}</td>
                            <td>{{$row->chauffeur->Prenom_chauffeur." ".$row->chauffeur->Nom_chauffeur}}</td>
                            <td>{{$row->vehicule->Num_immatriculation." "
                            .$row->vehicule->modele->Nom_Modele." ".
                            $row->vehicule->modele->constructeur->Nom_constructeur}}</td>
                            <td>{{$row->Datedepart}}</td>
                            <td>{{$row->Heuredepart}}</td>
                            <td>{{$row->Datearrivee}}</td>
                            <td>{{$row->Heurearrivee}}</td>
                            <td>{{$row->annee}}</td>
                            <td>{{$row->CompteurDepart}}</td>
                            <td>{{$row->Compteurarrivee}}</td>
                            <td>{{$row->Quantitecarburant}}</td>
                            <td>{{$row->destination->Nom_destination}}</td>
                            <td>{{$row->Prime}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/voyages/edit-{{$row->IdVoyage}}" class="btn btn-primary">Modifier</a>
                                <a href="/voyages/delete-{{$row->IdVoyage }}" class="btn btn-danger">Supprimer</a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

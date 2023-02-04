@extends('template')

@section('css-code')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endsection

@section('js-code')
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection

@section('content-heading-title','Liste des véhicules')
@section('content-heading-description','Liste des véhicules de la société')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Liste des véhicules')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Liste des véhicules 
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
                @can('admin_view')<a href="/vehicules/ajouter" class="btn btn-success">Ajouter</a>@endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Numéro d'immatriculation </th>
                            <th>Numéro carte grise</th>
                            <th>Constructeur</th>
                            <th>Modèle</th>
                            <th>Type du vehicule</th>
                            <th>Carburant</th>
                            <th>Numero d'ordre</th>
                            <th>Etat</th>
                            <th>Compteur final</th>
                            <th>Compteur dernier vidange</th>
                            <th>Chauffeur<br>(Dernier conducteur)</th>
                            @can('admin_view')<th>Action</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{$row->Num_immatriculation}}</td>
                            <td>{{$row->Numcartegris}}</td>
                            <td>{{$row->modele->constructeur->Nom_constructeur}}</td>
                            <td>{{$row->modele->Nom_Modele}}</td>
                            <td>{{$row->typeVehicule->Nomtypevehicule}}</td>
                            <td>{{$row->carburant->Nomcarburant}}</td>
                            <td>{{$row->Nordre}}</td>
                            <td>{{$row->Etat}}</td>
                            <td>{{$row->CompteurFinal}}</td>
                            <td>{{$row->CompteurDernierVidange}}</td>
                            <td>@if($row->Idchauffeur != null)
                                    {{$row->chauffeur->Prenom_chauffeur." ".$row->chauffeur->Nom_chauffeur}}
                                @endif
                            </td>
                            @can('admin_view')
                            <td>
                                <a href="/vehicules/edit-{{$row->Idvehicule}}" class="btn btn-primary" style="margin-left: auto;margin-right: auto;width: 6em">Modifier</a>
                                <a href="/vehicules/delete-{{$row->Idvehicule}}" class="btn btn-danger" style="margin-left: auto;margin-right: auto;width: 6em">Supprimer</a>
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

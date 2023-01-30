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

@section('content-heading-title','Liste des cartes de carburant')
@section('content-heading-description','Liste des cartes de carburant')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Liste des cartes de carburant')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Liste des cartes de carburant 
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
                @can('admin_view')<a href="/cartes-carburant/ajouter" class="btn btn-success">Ajouter</a>@endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Numéro de carte </th>
                            <th>Fournisseur de carburant</th>
                            <th>Type de carte</th>
                            <th>Numéro d'immatriculation</th>
                            <th>Carburant</th>
                            @can('admin_view')<th>Action</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{$row->Numcarte}}</td>
                            <td>{{$row->fournisseur->Nom_Fournisseur}}</td>
                            <td>{{$row->Typecarte}}</td>
                            <td>{{$row->vehicule->Num_immatriculation.' '.$row->vehicule->modele->Nom_Modele.' '.$row->vehicule->modele->constructeur->Nom_constructeur}}</td>
                            <td>{{$row->carburant->Nomcarburant}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/cartes-carburant/edit-{{$row->Idcarte}}" class="btn btn-primary" style="margin-left: auto;margin-right: auto;width: 6em">Modifier</a>
                                <a href="/cartes-carburant/delete-{{$row->Idcarte}}" class="btn btn-danger" style="margin-left: auto;margin-right: auto;width: 6em">Supprimer</a>
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

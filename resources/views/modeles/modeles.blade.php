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

@section('content-heading-title','Liste des modèles')
@section('content-heading-description','Liste des modèles de chaque constructeur')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Liste des modèles')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Liste des modèles de chaque constructeur 
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
                <a href="/modeles/ajouter" class="btn btn-success">Ajouter</a>
                @endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Modèle</th>
                            <th>Constructeur</th>
                            <th>Quantité du véhicule en stock</th>
                            @can('admin_view')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->Nom_Modele}}</td>
                            <td>{{ $row->constructeur->Nom_constructeur}}</td>
                            <td>{{$row->vehicule->count()}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/modeles/edit-{{$row->IdModele}}" class="btn btn-primary">Modifier</a>
                                <a href="/modeles/delete-{{$row->IdModele }}" class="btn btn-danger">Supprimer</a>
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

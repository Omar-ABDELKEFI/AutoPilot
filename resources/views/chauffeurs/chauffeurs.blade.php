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

@section('content-heading-title','Liste des chauffeurs')
@section('content-heading-description','Liste des chauffeurs de la societé')
@section('content-heading-path','Gestion des chauffeurs')
@section('content-heading-title-content','Liste des chauffeurs')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Liste des chauffeurs de la societé 
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
                <a href="/chauffeurs/ajouter" class="btn btn-success">Ajouter</a>
                @endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nom et prenom</th>
                            <th>Adresse</th>
                            <th>Numéro de permis</th>
                            <th>Type de permis de conduire</th>
                            <th>Telephone</th>
                            @can('admin_view')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->Nom_chauffeur." ".$row->Prenom_chauffeur}}</td>
                            <td>{{ $row->Adresse}}</td>
                            <td>{{ $row->Numpermis}}</td>
                            <td>{{ $row->typePermis->Nom_type_permis}}</td>
                            <td>{{ $row->Telephone}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/chauffeurs/edit-{{$row->Idchauffeur}}" class="btn btn-primary">Modifier</a>
                                <a href="/chauffeurs/delete-{{$row->Idchauffeur }}" class="btn btn-danger">Supprimer</a>
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

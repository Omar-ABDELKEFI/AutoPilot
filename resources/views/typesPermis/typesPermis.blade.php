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

@section('content-heading-title','Listes des types de permis')
@section('content-heading-description','Listes des types de permis de conduire')
@section('content-heading-path','Gestion des chauffeurs')
@section('content-heading-title-content','Listes des types de permis')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Liste des types de permis 
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
            @can('admin_view')<a href="/types-permis/ajouter" class="btn btn-success">Ajouter</a>@endcan
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Type de permis</th>
                        <th>Nombre de chauffeurs ayant le permis</th>
                        @can('admin_view')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->Nom_type_permis}}</td>
                        <td>{{$row->chauffeur->count()}}</td>
                        @can('admin_view')
                        <td>
                            <a href="/types-permis/edit-{{$row->IdtypeConduite}}" class="btn btn-primary">Modifier</a>
                            <a href="/types-permis/delete-{{$row->IdtypeConduite}}" class="btn btn-danger">Supprimer</a>
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
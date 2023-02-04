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

@section('content-heading-title','Listes des destinations')
@section('content-heading-description','Listes des destinations')
@section('content-heading-path','Gestion des voyages')
@section('content-heading-title-content','Listes des destinations')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Liste des destinations 
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
            @can('admin_view')<a href="/destinations/ajouter" class="btn btn-success">Ajouter</a>@endcan
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Destination</th>
                        @can('admin_view')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->Nom_destination}}</td>
                        @can('admin_view')
                        <td>
                            <a href="/destinations/edit-{{$row->Iddestination}}" class="btn btn-primary">Modifier</a>
                            <a href="/destinations/delete-{{$row->Iddestination}}" class="btn btn-danger">Supprimer</a>
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
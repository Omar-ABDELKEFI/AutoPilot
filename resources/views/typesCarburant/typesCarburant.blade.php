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

@section('content-heading-title','Liste des types de carburant')
@section('content-heading-description','Liste des types de carburant')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Liste des types de carburant')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Liste des types de carburant 
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
            @can('admin_view')<a href="/types-carburant/ajouter" class="btn btn-success">Ajouter</a>@endcan
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Carburant</th>
                        <th>Prix unitaire</th>
                        @can('admin_view')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->Nomcarburant}}</td>
                        <td>{{$row->Prixunitaire}}</td>
                        @can('admin_view')
                        <td>
                            <a href="/types-carburant/edit-{{$row->Idcarburant}}" class="btn btn-primary">Modifier</a>
                            <a href="/types-carburant/delete-{{$row->Idcarburant}}" class="btn btn-danger">Supprimer</a>
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
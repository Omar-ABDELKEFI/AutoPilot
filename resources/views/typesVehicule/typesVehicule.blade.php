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

@section('content-heading-title','Types des vehicules')
@section('content-heading-description',"Type des vehicules de l'entreprise")
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Types des vehicules')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Types des vehicules 
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
            <a href="/types-vehicule/ajouter" class="btn btn-success">Ajouter</a>
            @endcan
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Type de vehicule</th>
                        <th>Coefficient de consommation par Km</th>
                        <th>Quantité du véhicule en stock</th>
                        @can('admin_view')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->Nomtypevehicule}}</td>
                        <td>{{$row->Coefficientconskm}}</td>
                        <td>{{$row->vehicule->count()}}</td>
                        @can('admin_view')
                        <td>
                            <a href="/types-vehicule/edit-{{$row->Idtypevehicule}}" class="btn btn-primary">Modifier</a>
                            <a href="/types-vehicule/delete-{{$row->Idtypevehicule}}" class="btn btn-danger">Supprimer</a>
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
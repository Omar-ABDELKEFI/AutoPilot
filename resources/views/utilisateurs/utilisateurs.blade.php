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

@section('content-heading-title','Utilisateurs')
@section('content-heading-description',"Liste des utilisateurs de l'application")
@section('content-heading-path','Utilisateurs')
@section('content-heading-title-content','')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Liste des utilisateurs de l'application 
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
                <a href="/utilisateurs/register" class="btn btn-success">Ajouter</a>
                @endcan
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nom et prenom</th>
                            <th>Email</th>
                            <th>Numero de telephone</th>
                            <th>Adrese</th>
                            <th>Role</th>
                            @can('admin_view')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->name." ".$row->surname}}</td>
                            <td>{{ $row->email}}</td>
                            <td>{{ $row->phone_number}}</td>
                            <td>{{ $row->address}}</td>
                            <td>{{ $row->role->nom_role}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/utilisateurs/edit-{{$row->id}}" class="btn btn-primary">Modifier</a>
                                <a href="/utilisateurs/delete-{{$row->id }}" class="btn btn-danger">Supprimer</a>
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

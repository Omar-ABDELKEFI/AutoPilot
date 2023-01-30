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

@section('content-heading-title','Factures')
@section('content-heading-description','Factures des consommations de carburant de chaque vehicule')
@section('content-heading-path','Factures')
@section('content-heading-title-content','')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Factures des consommations de carburant de chaque vehicule
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
                <a href="/factures/import" class="btn btn-success">Importer</a>
                &nbsp;&nbsp;
                {{--<a href="/factures/ajouter" class="btn btn-success">Ajouter manuellement</a>--}}
                @endcan
                <div style="margin:15px 0px 15px 0px;">
                <input class="form-check-input me-1" type="checkbox" id="okok" name="okok">
                <label for="okok" style="color:red;font-size: 18px;">Factures erronées</label>
                </div>
                <table class="table table-striped " id="table1">
                    <thead>
                        <tr>
                            <th>Identifiant de facture</th>
                            <th>Numéro de carte</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Année</th>
                            <th>Compteur avant</th>
                            <th>Compteur actuellement</th>
                            <th>Quantité de carburant</th>
                            <th>Prix unitaire</th>
                            <th>Montant</th>
                            @can('admin_view')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        @php $test = $row->Idcarte == NULL || $row->CompteurFinal < $row->CompteurInitial; @endphp
                        <tr @if ($test) style="background-color: #aa0404db;color: white;" @endif>
                            <td>{{ $row->IdFacture}}</td>
                            <td>{{ $row->carte->Numcarte ?? "Carte inexistante"}}</td>
                            <td>{{ $row->DateConsommation}}</td>
                            <td>{{ $row->HeureConsommation}}</td>
                            <td>{{ $row->annee}}</td>
                            <td>{{ $row->CompteurInitial}}</td>
                            <td>{{ $row->CompteurFinal}}</td>
                            <td>{{ $row->QuantiteCarburant}}</td>
                            <td>{{ $row->Prixuni}}</td>
                            <td>{{ $row->Montant}}</td>
                            @can('admin_view')
                            <td>
                                <a href="/factures/edit-{{$row->IdFacture}}" class="btn btn-primary">Modifier</a>
                                <a href="/factures/delete-{{$row->IdFacture }}" class="btn btn-danger">Supprimer</a>
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

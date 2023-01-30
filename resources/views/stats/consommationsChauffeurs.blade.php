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

@section('content-heading-title','Suivi des consommations mensuel par chauffeur')
@section('content-heading-description','Suivi mensuel des consommations de carburant,
 des dépenses reliés et le total de km parcourus de chauque chauffeur de la société ')
@section('content-heading-path','Statistiques et suivi')
@section('content-heading-title-content','Suivi des consommations mensuel par chauffeur')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Suivi des consommations mensuel par chauffeur
            </div>
            
            <div class="card-header">
                <form class="form" action="/stats/consommations-chauffeurs" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-1">
                        <label for="dateInput">Date:</label>
                    </div>
                    <div class="d-flex col-md-4 col-12">
                    <input class="form-control me-1 mb-1" type="month" id="start" name="mois" 
                        max="{{Carbon\Carbon::now()->format('Y-m')}}" value="{{$date}}">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Confirmer
                    </button>
                    </div>
                </div>
                </form>
                @if ($date =='') 
                <div> 
                <h4 style="color:red;"> Veuillez insérer une date specifique pour voir les statistiques concernée</h4> 
                </div> 
                @endif
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
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Chauffeur</th>
                            <th>Nombre de voyage</th>
                            <th>Nombre de km parcourus</th>
                            <th>Quantité de carburant consommée</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($date !='')
                        @foreach ($chauffeurs as $row)
                        <tr>
                            <td>{{$row->Prenom_chauffeur." ".$row->Nom_chauffeur}}</td>
                            <td>
                                {{$row->nb_voyage}}
                            </td>
                            <td style="background-color: #04aa43db;color: white;">
                                {{$row->km_parcourus}}
                            </td>
                            <td style="background-color: #04AA6D;color: white;">
                                {{$row->quantite}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

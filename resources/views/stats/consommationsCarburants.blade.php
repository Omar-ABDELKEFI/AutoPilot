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

@section('content-heading-title','Suivi des consommations mensuel par carburant')
@section('content-heading-description','')
@section('content-heading-path','Statistiques et suivi')
@section('content-heading-title-content','Suivi des consommations mensuel par carburant')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
                Suivi des consommations mensuel par carburant
            </div>
            
            <div class="card-header">
                <form class="form" action="/stats/consommations-carburants" method="POST" >
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
                            <th>Carburant</th>
                            <th>Prix unitaire</th>
                            <th>Quantité de carburant total</th>
                            <th>Montant total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($date !='')
                        @foreach ($carburants as $row)
                        {{--@if ( $row->quantite * $row->montant != 0)--}}
                        <tr>
                            <td>{{$row->Nomcarburant}}</td>
                            <td>{{$row->Prixunitaire}}</td>
                            <td style="background-color: #04aa43db;color: white;">
                                {{$row->quantite}}
                            </td>
                            <td style="background-color: #04AA6D;color: white;">
                                {{$row->montant}}
                            </td>
                        </tr>
                        {{--@endif--}}
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('template')

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('js-code')
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables-primes.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection

@section('content-heading-title','Primes')
@section('content-heading-description',"Ici vous pouvez visioner visioner les primes enregistrées")
@section('content-heading-path','Primes')
@section('content-heading-title-content','')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
               <h6> Primes </h6>
            </div>
            
            <div class="card-header">
                <form class="form" action="/primes" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-1">
                        <label for="dateInput">Mois :</label>
                    </div>
                    <div class="d-flex col-md-4 col-12">
                    <input class="form-control me-1 mb-1" type="month" id="start" name="mois" 
                        max="{{Carbon\Carbon::now()->format('Y-m')}}" value="{{$date}}">
                    &nbsp;
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
                @if (Session::has('flash_false'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>
                            {{Session::get('flash_false')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
                @endif
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Chauffeur</th>
                                <th>Voyage avec prime / Voyages</th>
                                <th>Prime total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($date !='')
                            @php
                            $total_prime = 0;
                            @endphp
                            @foreach ($data as $row)
                            @php
                            {{$total_prime += $row->prime;}}
                            @endphp
                            <tr>
                                <td>{{$row->chauffeur->Prenom_chauffeur." ".$row->chauffeur->Nom_chauffeur}}</td>
                                <td>
                                    {{($row->nb_voyage_prime)." / ".($row->nb_voyage)}}
                                </td>
                                <td>
                                    {{$row->prime}}
                                </td>
                                <td>
                                    <a href="/primes/edit-{{$row->id_prime}}" class="btn btn-primary">Modifier</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="background-color: #04aa43db;color: white;">
                                    {{$total_prime}} = Total
                                </td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </section>
@endsection

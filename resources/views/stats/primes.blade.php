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

@section('content-heading-title','Suivi des primes')
@section('content-heading-description',"Ici vous pouvez visioner visioner les primes accordé aux chauffeurs et vous pouvez les enregistrer afin d'avoir le droit de les modifier")
@section('content-heading-path','Statistiques et suivi')
@section('content-heading-title-content','Suivi des primes')

@section('content')
    <section class="section">
        <div class="card">
            
            <div class="card-header">
               <h6> Suivi des primes </h6>
            </div>
            
            <div class="card-header">
                <form class="form" action="/stats/primes" method="POST" >
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
                            </tr>
                        </thead>
                        <tbody>
                            @if ($date !='')
                            @php
                            $total_prime = 0;
                            @endphp
                            @foreach ($chauffeurs_data as $row)
                            @php
                            {{$total_prime += $row->prime;}}
                            @endphp
                            <tr>
                                <td>{{$row->Prenom_chauffeur." ".$row->Nom_chauffeur}}</td>
                                <td>
                                    {{($row['voyage_primes'] ?? "0")." / ".($row['voyages'] ?? "0")}}
                                </td>
                                <td>
                                    {{$row['prime'] ?? "0"}}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="background-color: #04aa43db;color: white;">
                                    {{$total_prime}} = Total
                                </td>
                            </tr>
                            
                            @endif
                        </tbody>
                    </table>
                    @if ($date !='')
                    <form class="form" action="{{route('send.primes')}}" method="POST" >
                        @csrf
                        @php
                        $ii=0;
                        @endphp
                        @foreach ($chauffeurs_data as $row)
                            <input type="hidden" name="data[chauffeurs][{{$ii}}][Idchauffeur]" value="{{$row->Idchauffeur}}">
                            <input type="hidden" name="data[chauffeurs][{{$ii}}][voyages]" value="{{$row->voyages}}">
                            <input type="hidden" name="data[chauffeurs][{{$ii}}][voyage_primes]" value="{{$row->voyage_primes}}"> 
                            <input type="hidden" name="data[chauffeurs][{{$ii}}][prime]" value="{{$row->prime}}">
                            @php
                                $ii +=1;
                            @endphp
                        @endforeach
                        <input type="hidden" name="data[mois]" value="{{$date}}">
                        <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                            Enregistrer
                        </button>
                        </div>
                    </form> 
                    @endif
            </div>
        </div>
    </section>
@endsection

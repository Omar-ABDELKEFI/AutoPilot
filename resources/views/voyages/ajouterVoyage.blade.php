@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Voyages')
@section('content-heading-description','Liste des voyages')
@section('content-heading-path','Gestion des voyages')
@section('content-heading-title-content','Voyages')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/voyages" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau voyage</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/voyages/ajouter" method="POST" >
                        <div class="row">
                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Chauffeur</label>
                                    <select name="Idchauffeur" class="choices form-select">
                                        <option disabled selected placeholder value=0>Choisir...</option>                                    
                                        @foreach ( $dataC as $row )
                                            @if (old('Idchauffeur') == $row->Idchauffeur)
                                                <option value={{$row->Idchauffeur}} selected>{{$row->Prenom_chauffeur." ".$row->Nom_chauffeur}}</option>
                                            @else
                                                <option value={{$row->Idchauffeur}}>{{$row->Prenom_chauffeur." ".$row->Nom_chauffeur}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idchauffeur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Vehicule</label>
                                    <select name="Idvehicule" class="choices form-select">
                                        <option disabled selected placeholder value=0>Choisir...</option>                                    
                                        @foreach ( $dataV as $row )
                                            @if (old('Idvehicule') == $row->Idvehicule)
                                                <option value={{$row->Idvehicule}} selected>{{$row->Num_immatriculation." "
                                                    .$row->modele->Nom_Modele." ".
                                                    $row->modele->constructeur->Nom_constructeur}}</option>
                                            @else
                                                <option value={{$row->Idvehicule}}>{{$row->Num_immatriculation." "
                                                    .$row->modele->Nom_Modele." ".
                                                    $row->modele->constructeur->Nom_constructeur}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idvehicule')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Date depart</label>
                                    <input class="form-control" type="date" id="start" name="Datedepart" 
                                        max="{{Carbon\Carbon::now()->toDateString()}}" value="{{old('Datedepart')}}">
                                    @error('Datedepart')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Heure depart</label>
                                     <input class="form-control" type="time" 
                                        name="Heuredepart" required value="{{old('Heuredepart')}}">
                                    @error('Heuredepart')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Date arrivée</label>
                                    <input class="form-control" type="date" id="start" name="Datearrivee" 
                                        max="{{Carbon\Carbon::now()->toDateString()}}" value="{{old('Datearrivee')}}">
                                    @error('Datearrivee')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Heure arrivée</label>
                                    <input class="form-control" type="time" 
                                        name="Heurearrivee" required value="{{old('Heurearrivee')}}">
                                    @error('Heurearrivee')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Compteur Depart</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="CompteurDepart" autocomplete="off" value="{{old('CompteurDepart')}}">
                                    @error('CompteurDepart')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Compteur arrivee</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Compteurarrivee" autocomplete="off" value="{{old('Compteurarrivee')}}">
                                    @error('Compteurarrivee')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Quantite de carburant</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Quantitecarburant" autocomplete="off" value="{{old('Quantitecarburant')}}">
                                    @error('Quantitecarburant')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Destination</label>
                                    <select name="Iddestination" class="choices form-select">
                                        <option disabled selected placeholder value=0>Choisir...</option>                                    
                                        @foreach ( $dataD as $row )
                                            @if (old('Iddestination') == $row->Iddestination)
                                                <option value={{$row->Iddestination}} selected>{{$row->Nom_destination}}</option>
                                            @else
                                                <option value={{$row->Iddestination}}>{{$row->Nom_destination}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Iddestination')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Ajouter</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Réinitialiser</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
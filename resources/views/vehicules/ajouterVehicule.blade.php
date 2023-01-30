@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Liste des véhicules')
@section('content-heading-description','Liste des véhicules de la société')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Liste des véhicules')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/vehicules" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau vehicule a la société</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/vehicules/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Numéro d'immatriculation</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Num_immatriculation" autocomplete="off" value="{{old('Num_immatriculation')}}">
                                    @error('Num_immatriculation')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Numéro carte grise</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Numcartegris" autocomplete="off" value="{{old('Numcartegris')}}">
                                    @error('Numcartegris')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Modele</label>
                                    <select name="IdModele" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataM as $row )
                                            @if (old('IdModele') == $row->IdModele)
                                                <option value={{$row->IdModele}} selected>{{$row->constructeur->Nom_constructeur.' '.$row->Nom_Modele}}</option>
                                            @else
                                                <option value={{$row->IdModele}}>{{$row->constructeur->Nom_constructeur.' '.$row->Nom_Modele}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('IdModele')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Type du vehicule</label>
                                    <select name="Idtypevehicule" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataT as $row )
                                            @if (old('Idtypevehicule') == $row->Idtypevehicule)
                                                <option value={{$row->Idtypevehicule}} selected>{{$row->Nomtypevehicule}}</option>
                                            @else
                                                <option value={{$row->Idtypevehicule}}>{{$row->Nomtypevehicule}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idtypevehicule')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Carburant</label>
                                    <select name="Idcarburant" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataC as $row )
                                            @if (old('Idcarburant') == $row->Idcarburant)
                                                <option value={{$row->Idcarburant}} selected>{{$row->Nomcarburant}}</option>
                                            @else
                                                <option value={{$row->Idcarburant}}>{{$row->Nomcarburant}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idcarburant')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Compteur final</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="CompteurFinal" autocomplete="off" value="{{old('CompteurFinal')}}">
                                    @error('CompteurFinal')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Compteur dernier vidange</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="CompteurDernierVidange" autocomplete="off" value="{{old('CompteurDernierVidange')}}">
                                    @error('CompteurDernierVidange')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Numero d'ordre</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nordre" autocomplete="off" value="{{old('Nordre')}}">
                                    @error('Nordre')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Etat</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Etat" autocomplete="off" value="{{old('Etat')}}">
                                    @error('Etat')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Chauffeur</label>
                                    <select name="Idchauffeur" class="choices form-select">
                                        <option disabled selected value="" placeholder>Choisir...</option>
                                        @foreach ( $dataCh as $row )
                                            @if (old('Idchauffeur') == $row->Idchauffeur)
                                                <option value={{$row->Idchauffeur}} selected>{{$row->Prenom_chauffeur.' '.$row->Nom_chauffeur}}</option>
                                            @else
                                                <option value={{$row->Idchauffeur}}>{{$row->Prenom_chauffeur.' '.$row->Nom_chauffeur}}</option>
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
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Ajouter</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Réinitialiser</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
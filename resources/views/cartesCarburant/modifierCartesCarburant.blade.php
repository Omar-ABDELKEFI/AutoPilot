@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Liste des cartes de carburant')
@section('content-heading-description','Liste des cartes de carburant')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Liste des cartes de carburant')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/cartes-carburant" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau vehicule a la société</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/cartes-carburant/edit-{{$carte->Idcarte}}" method="POST" >
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Numéro de carte</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Numcarte" autocomplete="off" value="{{$carte->Numcarte ?? old('Numcarte')}}">
                                    @error('Numcarte')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Fournisseur de carburant</label>
                                    <select name="IdFournisseur" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataF as $row )
                                            @if (old('IdFournisseur',$carte->IdFournisseur) == $row->IdFournisseur)
                                                <option value={{$row->IdFournisseur}} selected>{{$row->Nom_Fournisseur}}</option>
                                            @else
                                                <option value={{$row->IdFournisseur}}>{{$row->Nom_Fournisseur}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('IdFournisseur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Type de carte</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Typecarte" autocomplete="off" value="{{$carte->Typecarte ?? old('Typecarte')}}">
                                    @error('Typecarte')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Carburant</label>
                                    <select name="Idcarburant" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataC as $row )
                                            @if (old('Idcarburant',$carte->Idcarburant) == $row->Idcarburant)
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
                                    <label for="first-name-column">Vehicule</label>
                                    <select name="Idvehicule" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $dataV as $row )
                                            @if (old('Idvehicule',$carte->Idvehicule) == $row->Idvehicule)
                                                <option value={{$row->Idvehicule}} selected>{{$row->Num_immatriculation.' '.$row->modele->Nom_Modele.' '.$row->modele->constructeur->Nom_constructeur}}</option>
                                            @else
                                                <option value={{$row->Idvehicule}}>{{$row->Num_immatriculation.' '.$row->modele->Nom_Modele.' '.$row->modele->constructeur->Nom_constructeur}}</option>
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
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Modifier</button>
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
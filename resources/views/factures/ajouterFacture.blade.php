@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Factures')
@section('content-heading-description','Factures des consommations de carburant de chaque vehicule')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Factures')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/cartes-carburant" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter une nouvelle facture manuellement</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/factures/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Numéro de carte</label>
                                    <select name="Idcarte" class="choices form-select">
                                        <option disabled selected value=0 placeholder>Choisir...</option>
                                        @foreach ( $data as $row )
                                            @if (old('Idcarte') == $row->Idcarte)
                                                <option value={{$row->Idcarte}} selected>{{$row->fournisseur->Nom_Fournisseur." ".$row->Numcarte}}</option>
                                            @else
                                                <option value={{$row->Idcarte}}>{{$row->fournisseur->Nom_Fournisseur." ".$row->Numcarte}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idcarte')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Date</label>
                                    <input class="form-control" type="date" id="start" name="DateConsommation" 
                                        max="{{Carbon\Carbon::now()->toDateString()}}">
                                    @error('DateConsommation')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Heure</label>
                                    <input class="form-control" type="time" 
                                        name="HeureConsommation" step="2" required >
                                    @error('HeureConsommation')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Compteur avant</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="CompteurInitial" autocomplete="off" value="{{old('CompteurInitial')}}">
                                    @error('CompteurInitial')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Compteur actuellement</label>
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
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Quantité de carburant</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="QuantiteCarburant" autocomplete="off" value="{{old('QuantiteCarburant')}}">
                                    @error('QuantiteCarburant')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Prix unitaire</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Prixuni" autocomplete="off" value="{{old('Prixuni')}}">
                                    @error('Prixuni')
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
@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Liste des chauffeurs')
@section('content-heading-description','Liste des chauffeurs de la societé')
@section('content-heading-path','Gestion des chauffeurs')
@section('content-heading-title-content','Liste des chauffeurs')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/chauffeurs" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau chauffeur</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/chauffeurs/ajouter" method="POST" >
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Nom</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Nom_chauffeur" autocomplete="off" value="{{old('Nom_chauffeur')}}">
                                    @error('Nom_chauffeur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Prenom</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Prenom_chauffeur" autocomplete="off" value="{{old('Prenom_chauffeur')}}">
                                    @error('Prenom_chauffeur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Adresse</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Adresse" autocomplete="off" value="{{old('Adresse')}}">
                                    @error('Adresse')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Numéro de permis</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Numpermis" autocomplete="off" value="{{old('Numpermis')}}">
                                    @error('Numpermis')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Type de permis</label>
                                    <select name="IdtypeConduite" class="choices form-select">
                                        <option disabled selected placeholder value="0">Choisir...</option>
                                        @foreach ( $data as $row )
                                            @if (old('IdtypeConduite') == $row->IdtypeConduite)
                                                <option value="{{$row->IdtypeConduite}}" selected>{{$row->Nom_type_permis}}</option>
                                            @else
                                                <option value="{{$row->IdtypeConduite}}">{{$row->Nom_type_permis}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('IdtypeConduite')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Telephone</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Telephone" autocomplete="off" value="{{old('Telephone')}}">
                                    @error('Telephone')
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
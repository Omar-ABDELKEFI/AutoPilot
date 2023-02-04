@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Liste des modèles')
@section('content-heading-description','Liste des modèles de chaque constructeur')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Liste des modèles')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/modeles" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau modèle de véhicule</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/modeles/ajouter" method="POST" >
                        <div class="row">
                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Constructeur</label>
                                    <select name="Idconstructeur" class="choices form-select">
                                        <option disabled selected placeholder value=0>Choisir...</option>                                    
                                        @foreach ( $data as $row )
                                            @if (old('Idconstructeur') == $row->Idconstructeur)
                                                <option value={{$row->Idconstructeur}} selected>{{$row->Nom_constructeur}}</option>
                                            @else
                                                <option value={{$row->Idconstructeur}}>{{$row->Nom_constructeur}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('Idconstructeur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Modele</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Nom_Modele" autocomplete="off" value="{{old('Nom_Modele')}}">
                                    @error('Nom_Modele')
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
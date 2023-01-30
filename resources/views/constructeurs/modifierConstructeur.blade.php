@extends('template')

@section('content-heading-title','Listes des constructeurs')
@section('content-heading-description','Listes des constructeurs des véhicules')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Listes des constructeurs')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/constructeurs" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Modifier un constructeur de véhicule</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/constructeurs/edit-{{$constructeur->Idconstructeur}}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Constructeur</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nom_constructeur" autocomplete="off" value="{{$constructeur->Nom_constructeur ?? old('Nom_constructeur')}}" >
                                    @error('Nom_constructeur')
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
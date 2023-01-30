@extends('template')

@section('content-heading-title','Listes des types de permis')
@section('content-heading-description','Listes des types de permis de conduire')
@section('content-heading-path','Gestion des chauffeurs')
@section('content-heading-title-content','Listes des types de permis')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/types-permis" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau type de permis de conduite</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/types-permis/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Type de permis</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nom_type_permis" autocomplete="off" value="{{old('Nom_type_permis')}}" >
                                    @error('Nom_type_permis')
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
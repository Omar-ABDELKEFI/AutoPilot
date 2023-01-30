@extends('template')

@section('content-heading-title','Liste des types de carburant')
@section('content-heading-description','Liste des types de carburant')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Liste des types de carburant')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/types-carburant" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau type de carburant</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/types-carburant/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Carburant</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nomcarburant" autocomplete="off" value="{{old('Nomcarburant')}}" >
                                    @error('Nomcarburant')
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
                                        placeholder="" name="Prixunitaire" autocomplete="off" value="{{old('Prixunitaire')}}" >
                                    @error('Prixunitaire')
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
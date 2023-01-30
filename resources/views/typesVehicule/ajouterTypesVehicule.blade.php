@extends('template')

@section('content-heading-title','Types des vehicules')
@section('content-heading-description',"Type des vehicules de l'entreprise")
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Types des vehicules')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/types-vehicule" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouveau type de véhicule</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/types-vehicule/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Type de vehicule</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Nomtypevehicule" autocomplete="off" value="{{old('Nomtypevehicule')}}">
                                    @error('Nomtypevehicule')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Coefficient de consommation par Km</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="Coefficientconskm" autocomplete="off" value="{{old('Coefficientconskm')}}">
                                    @error('Coefficientconskm')
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
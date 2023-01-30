@extends('template')

@section('content-heading-title','Liste des fournisseurs de carburant')
@section('content-heading-description','Liste des fournisseurs de carburant')
@section('content-heading-path','Gestion des consommations de carburant')
@section('content-heading-title-content','Liste des fournisseurs de carburant')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/fournisseurs-carburant" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Modifier un fournisseur de carburant</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/fournisseurs-carburant/edit-{{$fournisseur->IdFournisseur}}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Fournisseur</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nom_Fournisseur" autocomplete="off" value="{{$fournisseur->Nom_Fournisseur ?? old('Nom_Fournisseur')}}" >
                                    @error('Nom_Fournisseur')
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
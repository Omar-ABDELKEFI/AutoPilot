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
        <a href="/primes" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Modifier une prime d'un chauffeur</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/primes/edit-{{ $prime->id_prime }}" method="POST" >
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Chauffeur</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="chauffeur" readonly="readonly" autocomplete="off" value="{{$prime->chauffeur->Prenom_chauffeur." ".$prime->chauffeur->Nom_chauffeur ?? old('chauffeur')}}">
                                    @error('chauffeur')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Date</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="date" readonly="readonly" autocomplete="off" value="{{Carbon\Carbon::parse($prime->date)->format('Y-m') ?? old('date')}}">
                                    @error('date')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Prime</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="prime" autocomplete="off" value="{{$prime->prime ?? old('prime')}}">
                                    @error('prime')
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
                                    class="btn btn-light-secondary me-1 mb-1">Réinitialiser les données</button>
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
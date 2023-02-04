@extends('template')

@section('css-code')

<link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">

@endsection

@section('js-code')

<script src="{{asset('assets/js/extensions/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

@endsection

@section('content-heading-title','Listes des constructeurs')
@section('content-heading-description','Listes des constructeurs des véhicules')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Listes des constructeurs')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/destinations" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un nouvelle destination</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/destinations/ajouter" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Destination</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="" name="Nom_destination" autocomplete="off" value="{{old('Nom_destination')}}" >
                                @error('Nom_destination')
                                    <div class="invalid-feedback" style="display: contents">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <button id="text" type="submit"
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
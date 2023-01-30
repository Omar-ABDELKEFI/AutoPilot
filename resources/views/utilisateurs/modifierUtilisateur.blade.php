@extends('template')

@section('js-code')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
@endsection

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

@section('content-heading-title','Utilisateurs')
@section('content-heading-description',"Liste des utilisateurs de l'application")
@section('content-heading-path','Utilisateurs')
@section('content-heading-title-content','')

@section('content')

<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <a href="/utilisateurs" class="btn btn-info">Retour</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Modifier un modèle de véhicule</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/utilisateurs/edit-{{ $user->id }}" method="POST" >
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Nom</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="name" autocomplete="off" value="{{$user->name ?? old('name')}}">
                                    @error('name')
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
                                        placeholder="" name="surname" autocomplete="off" value="{{$user->surname ?? old('surname')}}">
                                    @error('surname')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Email</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="email" autocomplete="off" value="{{$user->email ?? old('email')}}">
                                    @error('email')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Numéro de telephone</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="" name="phone_number" autocomplete="off" value="{{$user->phone_number ?? old('phone_number')}}">
                                    @error('phone_number')
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
                                        placeholder="" name="address" autocomplete="off" value="{{$user->address ?? old('address')}}">
                                    @error('address')
                                        <div class="invalid-feedback" style="display: contents">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 ">
                                <div class="form-group">
                                    <label for="first-name-column">Role</label>
                                    <select name="role_id" class="choices form-select">
                                        <option disabled selected hidden placeholder value=0>Choisir...</option>
                                        @foreach ( $data as $row )
                                            @if (old('role_id',$user->role_id) == $row->role_id)
                                                <option value={{$row->role_id}} selected>{{$row->nom_role}}</option>
                                            @else
                                                <option value={{$row->role_id}}>{{$row->nom_role}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
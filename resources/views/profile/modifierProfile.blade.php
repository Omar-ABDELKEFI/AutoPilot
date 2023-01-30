@extends('template')

@section('content-heading-title','Profile')
@section('content-heading-description','')
@section('content-heading-path','Profile')
@section('content-heading-title-content','Modifier mon profil')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <a href="/profil" class="btn btn-info">Retour</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Modifier vos données de profil</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="/profil/edit" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nom</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Nom"
                                                    id="first-name-icon" name="name" value="{{ucwords(Auth::user()->name)}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                        {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Prenom</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Prenom"
                                                    id="first-name-icon" name="surname" value="{{ucwords(Auth::user()->surname)}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            @error('surname')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Email" id="email-id-icon" name="email" value="{{Auth::user()->email}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="mobile-id-icon">Numéro de telephone</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Numéro de telephone" name="phone_number" id="mobile-id-icon" value="{{Auth::user()->phone_number}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                            @error('phone_number')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Adresse</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Prenom"
                                                    id="first-name-icon" name="address" value="{{Auth::user()->address}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            @error('address')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Role</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Role"
                                                    id="first-name-icon" readonly="readonly" value="{{ucwords(Auth::user()->role->nom_role)}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Confirmer</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Réinitialiser</button>
                                    </div>
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
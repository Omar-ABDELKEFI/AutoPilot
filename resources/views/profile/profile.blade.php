@extends('template')

@section('content-heading-title','Profile')
@section('content-heading-description','')
@section('content-heading-path','Profile')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Données de profil</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if (Session::has('flash_true'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>
                            {{Session::get('flash_true')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
                        @endif
                        <form class="form form-vertical">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nom</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Nom"
                                                    id="first-name-icon" readonly="readonly" value="{{ucwords(Auth::user()->name)}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Prenom</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Prenom"
                                                    id="first-name-icon" readonly="readonly" value="{{ucwords(Auth::user()->surname)}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Email" id="email-id-icon" readonly="readonly" value="{{Auth::user()->email}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="mobile-id-icon">Numéro de telephone</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Numéro de telephone" id="mobile-id-icon" readonly="readonly" value="{{Auth::user()->phone_number}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Adresse</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Adresse"
                                                    id="first-name-icon" readonly="readonly" value="{{Auth::user()->address}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
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
                                    <div class="col-12 d-flex justify-content-center">
                                        <a class="btn btn-secondary2 me-1 mb-1" href="/profil/edit" style="color:#fff;">Modifier mon profil</a>
                                        <a class="btn btn-secondary2 me-1 mb-1" href="/profil/change-password" style="color:#fff">Changer mon mot de passe</a></button>
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
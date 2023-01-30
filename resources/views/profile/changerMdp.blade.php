@extends('template')

@section('js-code')

<script src="{{asset('assets/js/extensions/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

@endsection

@section('content-heading-title','Profile')
@section('content-heading-description','Changer mon mot de passe')
@section('content-heading-path','Profile')
@section('content-heading-title-content','Changer mon mot de passe')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <a href="/profil" class="btn btn-info">Retour</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Changer mon mot de passe</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if (Session::has('flash_true'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{Session::get('flash_true')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
                        @endif
                        @if (Session::has('flash_false'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <i class="bi bi-file-excel"></i>
                            {{Session::get('flash_false')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <form class="form form-vertical" action="/profil/change-password" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Mot de passe actuel</label>
                                            <div class="position-relative">
                                                <input name="current_password" type="password" class="form-control" placeholder="Mot de passe actuel" id="password-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('current_password')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Nouveau mot de passe</label>
                                            <div class="position-relative">
                                                <input name="new_password" type="password" class="form-control" placeholder="Nouveau mot de passe" id="password-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('new_password')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Confirmation du nouveau mot de passe</label>
                                            <div class="position-relative">
                                                <input name="new_password_confirmation" type="password" class="form-control" placeholder="Confirmation du nouveau mot de passe" id="password-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('new_password_confirmation')
                                                <div class="invalid-feedback" style="display: contents">
                                                    <i class="bx bx-radio-circle"></i>
                                                         {{$message}}
                                                </div>
                                            @enderror
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
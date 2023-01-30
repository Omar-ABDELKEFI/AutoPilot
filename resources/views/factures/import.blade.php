@extends('template')

@section('content-heading-title','Factures')
@section('content-heading-description','Importation du ficheir CSV')
@section('content-heading-path','Factures')
@section('content-heading-title-content','Importation du ficheir CSV')

@section('content')
<section id="custom-file-input">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Importer le fichier CSV contentant les données des factures de transaction effectué par chaque conducteur de vehicule </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <form method="POST" enctype="multipart/form-data" action="/factures/import">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" name="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04"
                                            aria-label="Upload">
                                        <button class="btn btn-primary" type="submit"
                                            id="inputGroupFileAddon04">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
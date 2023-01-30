@extends('template')

@section('css-code')
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('js-code')
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

{{--<script>
document.getElementById('code-v').addEventListener('click', async (e) => {

e.preventDefault();
const href = document.querySelector('#code-v').getAttribute('href');

const { value: password } = await Swal.fire({
    title: 'Entrer le code de confimation',
    input: 'password',
    inputLabel: 'Code',
    inputPlaceholder: '',
    inputAttributes: {
    maxlength: 10,
    autocapitalize: 'off',
    autocorrect: 'off'
    }
})

if (password == "{{$eee}}") {
    document.location.href = href ;
}

})
</script> --}}

<script src="{{asset('assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

@endsection

@section('content-heading-title','Listes des constructeurs')
@section('content-heading-description','Listes des constructeurs des véhicules')
@section('content-heading-path','Gestion des véhicules')
@section('content-heading-title-content','Listes des constructeurs')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            Liste des constructeurs 
        </div>
        
        <div class="card-body">
            @if (Session::has('flash_true'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>
                            {{Session::get('flash_true')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
            @endif
            @if (Session::has('flash_false'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>
                            {{Session::get('flash_false')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> 
            @endif
            @can('admin_view')
            <a href="/constructeurs/ajouter" class="btn btn-success">Ajouter</a>
            @endcan
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Constructeur</th>
                        <th>Quantité du véhicule en stock</th>
                        @can('admin_view')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->Nom_constructeur}}</td>
                        <td>{{$row->vehicule->count()}}</td>
                        @can('admin_view')
                        <td>
                            <a href="/constructeurs/edit-{{$row->Idconstructeur}}" id='code-v' class="btn btn-primary">Modifier</a>
                            <a href="/constructeurs/delete-{{$row->Idconstructeur}}" class="btn btn-danger">Supprimer</a>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@extends('template')

@section('content')

<div class='section'>
<div class="col-md-6-welcome col-sm-12">
    <div class="card-welcome">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="assets/images/samples/welcome.png"
                alt="Card image cap" style="height: 20rem" />
            <div class="card-body">
                <h4 class="card-title-welcome">Bienvenue sur la page d'accueil de l'application</h4>
                <p class="card-text">
                    Bienvenue {{ucwords(Auth::user()->surname." ".Auth::user()->name)}}.
                    @if (Auth::user()->role_id == 1)
                        Vous avez un role d'administrateur donc vous pouvez ajouter, modifier et supprimer des données 
                        et même génerer des suivis concernant ces derniers. 
                        Vous pouvez aussi gérer les comptes utilisateur de l'application
                    @elseif(Auth::user()->role_id == 2)
                        Vous avez un role d'observateur donc vous pouvez seulement visualiser les données saisies.
                    @endif
                </p>
                {{--<p class="card-text">
                    Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
                    muffin.
                </p>
                <button class="btn btn-primary block">Update now</button>--}}
            </div>
        </div>
    </div>
</div>
</section>

@endsection
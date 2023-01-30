<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super mousse</title>
    <link rel="icon" href="{{asset('assets/images/logo/logo2.png')}}" type="image/icon type">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    @yield('css-code')

    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg" type="image/x-icon')}}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="{{asset('assets/images/logo/logo2.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="/welcome" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Bienvenue</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-truck"></i>
                                <span>Gestion des véhicules</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/constructeurs">Liste des constructeurs</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/modeles">Liste des modèles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/types-vehicule">Types des véhicules</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/vehicules">Liste des véhicules</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Gestion des chauffeurs</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/types-permis">Listes des types de permis</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/chauffeurs">Listes des chauffeurs</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Gestion des consommations de carburant</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/fournisseurs-carburant">Liste des fournisseurs de carburant</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/types-carburant">Liste des types de carburant</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/cartes-carburant">Liste des cartes de carburant</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-briefcase-fill"></i>
                                <span>Gestion des voyages</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/destinations">Destinations</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/voyages">Voyages</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item ">
                            <a href="/factures" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Factures</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="/primes" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Primes</span>
                            </a>
                        </li>

                        <hr>

                        <li class="sidebar-item">
                            <a href="/utilisateurs" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Utilisateurs</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-graph-up"></i>
                                <span>Statitiques et Suivi</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/stats/consommations-vehicules">
                                        Suivi des consommations mensuel par vehicule</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/stats/consommations-chauffeurs">
                                        Suivi des consommations mensuel par chauffeur</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/stats/consommations-carburants">
                                        Suivi des consommations mensuel par carburant</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/stats/primes">
                                        Suivi des primes</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <br>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Vidanges de vehicule</h6>
                                        </li>
                                        @php
                                            $vidanges = \App\Models\Vehicule::all();
                                        @endphp
                                        @foreach ( $vidanges as $vi )
                                            @if ($vi->CompteurFinal - $vi->CompteurDernierVidange < 10000 
                                            && $vi->CompteurFinal - $vi->CompteurDernierVidange >=9000 )
                                                <li><a class="dropdown-item" style="color: orange;">{{$vi->Num_immatriculation}} devrait avoir une vidange aprés {{10000 -($vi->CompteurFinal - $vi->CompteurDernierVidange)}} Km </a></li>
                                            @elseif ( $vi->CompteurFinal - $vi->CompteurDernierVidange > 10000)
                                                <li><a class="dropdown-item" style="color: red;">{{$vi->Num_immatriculation}} a fait {{$vi->CompteurFinal - $vi->CompteurDernierVidange}} Km apres sa derniere vidange</a></li>
                                            @endif
                                        @endforeach
                                        {{--<li><a class="dropdown-item">No notification available</a></li>--}}
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ucwords(Auth::user()->surname." ".Auth::user()->name)}}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{Auth::user()->role->nom_role}}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('assets/images/faces/blank-profile-picture.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Bonjour, {{ucwords(Auth::user()->surname)}}!</h6>
                                    </li>
                                    <li><a class="dropdown-item active" href="/profil"><i class="icon-mid bi bi-person me-2"></i>
                                            Profile</a></li>
            
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        document.getElementById('form-log-out').submit();"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>Déconnexion</a>
                                        <form action="{{ route('logout') }}" method="POST" id="form-log-out" style="display: none;">
                                        @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>@yield('content-heading-title')</h3>
                                <p class="text-subtitle text-muted">@yield('content-heading-description')</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">@yield('content-heading-path')</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="index.html">@yield('content-heading-title-content')</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                    
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy;</p>
                        </div>
                        <div class="float-end">
                            <p>Build by <a href="https://www.linkedin.com/in/alae-fendri/" target="_blank">Alae Fendri</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    @yield('js-code')

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
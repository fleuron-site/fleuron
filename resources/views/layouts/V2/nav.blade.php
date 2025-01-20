<style>

    

    @media screen and (max-width: 768px) {

        li .btn{

        margin-top: 10px;

        }

        .navbar-marketing .navbar-toggler {

            padding: 0rem!important;

        }

        

        .navbar-marketing .navbar-toggler i{

            vertical-align: middle;

            height: 0rem; 

            width: 1.5rem;

        }

    }

    

    .navbar-brand img{

            height: 3rem;

        }

    

    @media screen and (max-width: 768px) {

        .navbar-brand img{

            height: 2rem;

        }

    }

    

</style>

<nav class="navbar navbar-marketing navbar-expand-lg bg-light navbar-light" style="border-bottom: solid #0061f2;">

    <div class="container px-5">

        <a class="navbar-brand text-primary" href="{{route('welcome')}}"><img class="img-fluid logo_1" src="{{ asset('assets/img/logo/logo.webp') }}" alt="Fleuron"/></a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fa-solid fa-bars"></i>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto me-lg-5">

                @if(Auth::check())

                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Accueil</a></li>

                @else

                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Accueil</a></li>

                @endif

                <li class="nav-item"><a class="nav-link" href="{{route('principeFonctionnement')}}">Comment ça marche ?</a></li>

                <li class="nav-item"><a class="nav-link" href="{{route('contacts')}}">Contacts</a></li>

                <li class="nav-item">

                    <a class="btn fw-500 ms-lg-4 btn-primary" href="{{route('offres')}}">

                        Offres

                    </a>

                </li>

                @if(Auth::check())

                    <li class="nav-item dropdown no-caret dropdown-user">

                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            @if(!empty(Auth::user()->avatar))

                                <img class="rounded-circle" src="{{ asset('storage/' . Auth::user()->avatar) }}" width="35" class="0 size-30x30">

                            @else

                                <img class="rounded-circle" src="{{ asset('storage/uploads/profil/user.png') }}" width="35" class="0 size-30x30">

                            @endif

                        </a>

                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">

                            <h6 class="dropdown-header d-flex align-items-center">

                                @if(!empty(Auth::user()->avatar))

                                    <img class="rounded-circle dropdown-user-img" src="{{ asset('storage/' . Auth::user()->avatar) }}" width="35" class="0 size-30x30">

                                @else

                                    <img class="rounded-circle dropdown-user-img" src="{{ asset('storage/uploads/profil/user.png') }}" width="35" class="0 size-30x30">

                                @endif

                                &nbsp;&nbsp;

                                <div class="dropdown-user-details">

                                    <div class="dropdown-user-details-name">{{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</div>

                                    <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>

                                </div>

                            </h6>

                            <div class="dropdown-divider"></div>

                            <a href="{{ route('profile') }}" class="dropdown-item">

                                <i class="fa fa-user"></i>&nbsp;&nbsp;

                                Mon profil

                            </a>

                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}" class="text-center">

                                @csrf

                                <a class="dropdown-item"  href="{{ route('logout') }}"

                                                onclick="event.preventDefault(); this.closest('form').submit();">

                                    <div class="dropdown-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">

                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>

                                        </svg>

                                    </div>

                                    {{ __('Me deconnecter') }}

                                </a>

                            </form> 

                        </div>

                    </li>  

                @else

                    <li class="nav-item">

                        <a class="btn btn btn-outline-primary bs-btn-color-black fw-500 ms-lg-4" href="{{ route('login') }}">

                            Connexion

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="btn fw-500 ms-lg-4 btn-danger" href="{{ route('register') }}">

                            Inscription

                        </a>

                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>
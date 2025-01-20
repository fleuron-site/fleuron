<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('welcome') }}">FLEURON</a>

    <!-- <form class="form-inline me-auto d-none d-lg-block me-3">

        <div class="input-group input-group-joined input-group-solid">

            <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />

            <div class="input-group-text"><i data-feather="search"></i></div>

        </div>

    </form> -->

    <ul class="navbar-nav align-items-center ms-auto">

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">

            @if(!empty(Auth::user()->avatar))

                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle dropdown-user-img" src="{{ asset('storage/'. Auth::user()->avatar) }}" width="35" class="0 size-30x30"></a>

            @else

                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle dropdown-user-img" src="{{ asset('storage/uploads/profil/user.png') }}" width="35" class="0 size-30x30"></a>

            @endif

            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">

                <h6 class="dropdown-header d-flex align-items-center">

                    @if(!empty(Auth::user()->avatar))

                        <img class="rounded-circle dropdown-user-img" src="{{ asset('storage/'. Auth::user()->avatar) }}" width="35" class="0 size-30x30">

                    @else

                        <img class="rounded-circle dropdown-user-img" src="{{ asset('storage/uploads/profil/user.png') }}" width="35" class="0 size-30x30">

                    @endif

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

                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">

                        <div class="dropdown-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">

                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>

                            </svg>

                        </div>

                        {{ __('Me deconnecter') }}

                    </a>

                </form>

            </div>

        </li>

    </ul>

</nav>
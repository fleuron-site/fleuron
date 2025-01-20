@extends('layouts.V2.app')

@section('content')

    <section class="bg-white py-5">

        <header class="page-header page-header-light bg-light pb-10  mt-n5">

            <div class="container-xl px-4">

                <div class="page-header-content pt-4">

                    <div class="row align-items-center justify-content-between">

                        <div class="col-auto mt-4">

                            <h1 class="page-header-title">

                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                Votre profile

                            </h1>

                            <div class="page-header-subtitle"></div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                <div class="col-xl-3">
                    <!-- Profile picture card-->

                    <div class="card mb-4 mb-xl-0">

                        <div class="card-body text-center">

                            <div class="d-flex flex-column align-items-center text-center">

                                <!-- Profile picture image-->

                                @if(!empty(Auth::user()->avatar))
                                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('storage/' . Auth::user()->avatar) }}">
                                @else

                                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('storage/uploads/profil/user.png') }}">

                                @endif                                

                                <span class="font-weight-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>

                                <span class="text-black-50"><i>Profile:

                                        {{ auth()->user()->roles ? auth()->user()->roles->pluck('name')->first() : 'N/A' }}</i>
                                </span>

                                <span class="text-black-50">{{ auth()->user()->email }}</span>

                                <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Changer photo de profile</button>

                            </div>

                        </div>

                    </div>

                </div> 

                <div class="col-lg-9">
                    <div class="default">
                        <!-- Account details card-->
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-right">Modifiez vos informations personnelles</h2>
                                <hr>
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-xl-6 mt-2">
                                            <label class="labels">Prenom</label>
                                            <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                                name="first_name" placeholder="Prenom"
                                                value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}">

                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6  mt-2">
                                            <label class="labels">Nom</label>
                                            <input type="text" name="last_name"
                                                class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}"
                                                placeholder="Last Name">

                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="row mt-4">
                                        <div class="col-xl-12 mt-2">
                                            <label class="labels">Adresse email</label>
                                            <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') ? old('email') : auth()->user()->email }}"
                                                placeholder="Email">
                                            @error('mobile_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between mt-2">

                                        <p class="lead mb-0"></p>

                                        <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>

                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <h2>Initilisation du mot de passe</h2>
                                <hr>
                                <form class="profile-settings" role="form" method="POST" action="{{ route('users.postCredentials') }}">

                                    @csrf

                                    <!-- Form Group (username)-->

                                    <div class="mb-3">

                                        <label class="small mb-1" for="inputUsername">Mot de passe actuel</label>

                                        <input type="password" name="current-password" id="current-password" class="form-control" placeholder="{{ __('Renseigner mot de passe actuel') }}" data-parsley-trigger="change" data-parsley-range="[4, 20]" required>

                                        @error('password')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                    </div>

                                    <!-- Form Row-->

                                    <div class="row gx-3 mb-3">

                                        <!-- Form Group (first name)-->

                                        <div class="col-md-6">

                                            <label class="small mb-1" for="inputFirstName">Nouveau mot de passe</label>

                                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Renseigner nouveau mot de passe') }}" data-parsley-trigger="change" data-parsley-range="[4, 20]" required>

                                            @error('password')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                        <!-- Form Group (last name)-->

                                        <div class="col-md-6">

                                            <label class="small mb-1" for="inputLastName">Confirmation du nouveau mot de passe</label>

                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmer mot de passe') }}" data-parsley-trigger="change" data-parsley-range="[4, 20]" data-parsley-equalto="#password" required>

                                            @error('password')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>

                                   

                                    <div class="d-flex align-items-center justify-content-between mt-2">

                                        <p class="lead mb-0"></p>

                                        <button type="submit" class="btn btn-outline-primary">Valider</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        @include('layouts.V2.banderole')

    </section>



    <!-- Modal -->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalCenterTitle">Charger votre photo de profile</h5>

                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('update_avatar') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">

                    {{ csrf_field() }}

                        <input type="file" name="avatar" class="form-control">

                        <div class="modal-footer">

                            <button class="btn btn-primary" type="submit">Valider!</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
@extends('layouts.V2.app')
@section('content')
    <!-- Page Header-->
    <header class="page-header-ui page-header-ui-light bg-white">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <!-- Social login form-->
                <div class="card my-5">
                    <div class="card-body p-5 text-center">
                        <div class="h3 fw-light mb-3">Réinitialisation du mot de passe</div>
                        <!-- Social login links
                        <a class="btn btn-icon btn-facebook mx-1" href="#!"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
                        <a class="btn btn-icon btn-github mx-1" href="#!"><i class="fab fa-github fa-fw fa-sm"></i></a>
                        <a class="btn btn-icon btn-google mx-1" href="#!"><i class="fab fa-google fa-fw fa-sm"></i></a>
                        <a class="btn btn-icon btn-twitter mx-1" href="#!"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>
                        -->
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-5">
                        <!-- Login form-->
                        <form method="POST" action="{{ route('password_reset') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="emailExample">Addresse e-mail</label>
                                <input class="form-control form-control-solid underline-input @error('email') is-invalid @enderror text-center" type="email" name="email" placeholder="{{__('Entrer votre Email')}}" required/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('Ces informations d\'identification ne correspondent pas à nos dossiers.') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="passwordExample">Mot de passe</label>
                                <input class="form-control form-control-solid underline-input @error('password') is-invalid @enderror text-center" type="password" name="password" placeholder="{{__('Mot de passe...')}}"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ __('Ces informations d\'identification ne correspondent pas à nos dossiers.') }}
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="passwordExample">Confirmation du mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            </div>
                            
                            <!-- Form Group (forgot password link)-->
                            @if (!Route::has('password.request'))
                                <div class="mb-3">
                                    <a class="col-auto" href="{{ route('password.request') }}" style="padding: 15px; font-size: 0.75em">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                </div>
                            @endif
                            <!-- Form Group (login box)-->
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="form-check">
                                    <input class="form-check-input" id="checkRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="checkRememberPassword">Mémoriser le mot de passe</label>
                                </div>
                                <button class="btn btn-primary" type="submit">Réinitialisez mot de passe!</button>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-5 py-4">
                        <div class="small text-center">
                            <a href="{{ route('register') }}">
                                {{ __('Créer un compte!') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </header>
@endsection
                            
@extends('layouts.V2.app')
@section('content')
    <!-- Page Header-->
    <header class="page-header-ui page-header-ui-light bg-white">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <!-- Social forgot password form-->
                <div class="card my-5">
                    <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Récupération de mot de passe</div></div>
                    <hr class="my-0" />
                    <div class="card-body p-5">
                        <div class="text-center small text-muted mb-4">Entrez votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe.</div>
                        <!-- Forgot password form-->
                        <form method="POST" action="{{ route('password.email') }}" class="form">
                            @csrf
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="text-gray-600 small" for="emailExample">Addresse e-mail</label>
                                <input type="email" name="email" class="form-control form-control-solid underline-input  text-center" placeholder="{{__('Entrez votre email')}}" required>
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="form-check">
                                </div>
                                <!-- Form Group (reset password button)    -->
                                <button class="btn btn-primary" type="submit">Réinitialiser le mot de passe</button>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    
                    
                    <div class="card-body px-5 py-4">
                        <div class="small text-center">
                            Nouvel utilisateur?
                            <a href="{{ route('register') }}">Créez un compte!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </header>
@endsection
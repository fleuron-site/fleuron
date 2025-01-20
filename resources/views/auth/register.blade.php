@extends('layouts.V2.app')
@section('content')
    <!-- Page Header-->
    <header class="page-header-ui page-header-ui-light bg-white">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                <!-- Social registration form-->
                <div class="card my-5">
                    <div class="card-body p-4">
                        <!-- <div class="text-center small text-muted mb-4">Veuillez compléter le formulaire pour s'inscrire</div>
                        
                        <hr class="my-0" /> -->
                        <form method="POST" action="{{ route('register') }}" class="mt-2">
                            @csrf
                            <div class="step" id="step1">
                                <div class="text-center my-10">
                                    <h1 class="text-primary mb-2">Choix du type de compte.</h1>
                                    <p class="lead">Que souhaitez-vous faire sur Fleuron ?</p>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input class="btn-check" id="btnMonthlyBilling" type="radio" value="2" name="role_id" autocomplete="off" checked="" wfd-id="id2">
                                        <label class="btn btn-outline-orange" for="btnMonthlyBilling">Trouver ou postuler à une offre</label>
                                        <input class="btn-check" id="btnYearlyBilling" type="radio" value="3" name="role_id" autocomplete="off" wfd-id="id3">
                                        <label class="btn btn-outline-orange" for="btnYearlyBilling">Trouver un prestataire pour mon projet</label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                    </div>
                                    <button class="btn btn-primary" onclick="nextStep(1)">Suivant</button>
                                </div>
                            </div>
                            <div class="step" id="step2">
                                <div class="row gx-3">
                                    <div class="col-md-6">
                                        <!-- Form Group (first name)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="firstNameExample">Nom du responsable</label>
                                            <input type="text" class="form-control form-control-solid @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{__('Entrez votre nom de famille')}}" required>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Form Group (last name)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="lastNameExample">Prénom du responsable</label>
                                            <input type="text" class="form-control form-control-solid  @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{__('Entrez votre prenom')}}" required>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="text-gray-600 small" for="emailExample">Addresse e-mail</label>
                                    <input type="email" class="form-control form-control-solid underline-input  @error('email') is-invalid @enderror" name="email" placeholder="{{__('Entrez votre email')}}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3">
                                    <div class="col-md-6">
                                        <!-- Form Group (choose password)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="passwordExample">Mot de passe</label>
                                            <input type="password" placeholder="{{__('Mot de passe...')}}" name="password" class="form-control form-control-solid  @error('password') is-invalid @enderror" required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Form Group (confirm password)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="confirmPasswordExample">Confirmer le mot de passe</label>
                                            <input type="password" class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Confirmer mot de passe') }}" required>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkTerms" type="checkbox" value="" required />
                                            <label class="form-check-label" for="checkTerms">
                                                J’accepte les
                                                <a href="{{ route('principeFonctionnement') }}"> &amp;conditions</a>
                                                .
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="text-align:right;">
                                        <button class="btn btn-outline-cyan" type="button" onclick="prevStep(2)" style="margin: 0.5em;">Précédent</button>
                                        <button class="btn btn-primary" type="submit" style="margin: 0.5em;">Créer un compte</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-5 py-4">
                        <div class="small text-center">
                            Avez-vous un compte?
                            <a href="{{ route('login') }}">Connectez-vous!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </header>
    
    <script>
        var currentStep = 1;
        showStep(currentStep);
    
        function showStep(step) {
          var steps = document.getElementsByClassName("step");
          for (var i = 0; i < steps.length; i++) {
            steps[i].style.display = "none";
          }
          steps[step - 1].style.display = "block";
        }
    
        function nextStep(step) {
          if (step < document.getElementsByClassName("step").length) {
            showStep(step + 1);
            currentStep = step + 1;
          }
        }
    
        function prevStep(step) {
          if (step > 1) {
            showStep(step - 1);
            currentStep = step - 1;
          }
        }
    </script>
@endsection
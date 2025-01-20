<!doctype html>
<html class="no-js" lang="fr">


<!-- Mirrored from thememakker.com/templates/falcon/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 17:37:26 GMT -->
<head>
  <meta charset="utf-8" />
  <title>Fleuron</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="assets/js/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Files -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="{{ asset('css/test.css')}}" rel="stylesheet" type="text/css"/>
  
    <style>
        .invalid-feedback {
            color: #cd2525;
        }
    </style>
        
</head>

<body id="falcon" class="authentication">
  <div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/images/login-bg.jpg'); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
            <div class="card card-signup">

              <form method="POST" action="{{ route('login') }}">
                  @csrf
                <!--<div class="header header-primary text-center">
                  <h4>{{__("S'identifier")}}</h4>
                  <div class="social-line">
                    <a href="javascript:void(0);" class="btn btn-just-icon">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a  href="javascript:void(0);" class="btn btn-just-icon">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-just-icon">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>-->
                <br>
                <a href="{{ route('welcome') }}" style="text-decoration: none;"><h3 class="mt-0">Fleuron</h3></a>
                <!--<p class="help-block">{{__("Ou soyez classique")}}</p>-->
                <p class="help-block text-center" style="font-size: 1rem;">{{__("Renseignez vos informations d'identification ci-après")}}</p>
                <div class="content">
                  <div class="form-group">
                    <input type="email" class="form-control underline-input @error('email') is-invalid @enderror text-center" name="email" placeholder="{{__('Entrer votre Email')}}" required>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ __('Ces informations d\'identification ne correspondent pas à nos dossiers.') }}</strong>
                      </span>
                    @enderror

                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="{{__('Mot de passe...')}}" class="form-control underline-input @error('password') is-invalid @enderror text-center">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          {{ __('Ces informations d\'identification ne correspondent pas à nos dossiers.') }}
                      </span>
                    @enderror
                  </div>
                  <div class="row no-gutters">
                    <label class="" style="font-size: 0.75em; padding: 15px">
                      <input type="checkbox" class="col-auto" name="optionsCheckboxes"> {{__("Souviens-toi de moi")}}
                    </label>
                    @if (Route::has('password.request'))
                      <a class="col-auto" href="{{ route('password.request') }}" style="padding: 15px; font-size: 0.75em">
                          {{ __('Mot de passe oublié?') }}
                      </a>
                  @endif
                  </div>
                </div>
                <div class="footer text-center">
                  <button class="btn connexionbtn" type="submit">{{__("Connexion")}}</button>
                </div>
                  
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer mt-20">
        <div class="container">
          <div class="col-lg-12 text-center">
            <a href="{{route('register')}}" class="text-uppercase text-black" style="text-decoration: none;">{{__("Créer un compte")}}</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--  Vendor JavaScripts -->
  <script src="assets/bundles/libscripts.bundle.js"></script>
  <script src="assets/bundles/mainscripts.bundle.js"></script>
  <!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/falcon/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 17:37:26 GMT -->
</html>
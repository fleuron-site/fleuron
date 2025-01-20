<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Google tag (gtag.js) ANALYTIQUE-->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-CHXFT06Q6Q"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-CHXFT06Q6Q');
        </script>
        
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Fleuron a été créée pour vous faciliter la vie! trouvez facilement, une personne qualifiée et digne de confiance pour vous aider à atteindre vos objectif."/>
        
        @if(request()->is('offre/*'))
            <meta property="og:title" content="{{ $donnees->name }}"/>
            <meta property="og:description" content="{{ $donnees->name}}">
            <meta property="og:image" content="uploads/photoreseaux/{{ $donnees->imageurl->img }}"/>
            <meta property="og:image:alt" content="{{ $donnees->imageurl->descrip }}"/>
            <meta property="og:url" content="fleuron.tg"/>
            <meta property="og:type" content="website"/>
            <meta name="twitter:card" content="summary_large_image"/>
            
            <!-- Balises Twitter Card pour un meilleur partage sur Twitter -->
            <meta name="twitter:card" content="{{ $donnees->imageurl->descrip }}">
            <meta property="twitter:title" content="{{ $donnees->name }}"/>
            <meta property="twitter:description" content="{{ $donnees->name}}">
            <meta property="twitter:image" content="uploads/photoreseaux/{{ $donnees->imageurl->img }}"/>
            <meta property="twitter:image:alt" content="{{ $donnees->imageurl->descrip }}"/>
            <meta property="twitter:url" content="fleuron.tg"/>
            <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=#{property?._id}&product=custom-share-buttons&source=platform"></script>
        @endif 
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-FL2WKBJTJ5"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-FL2WKBJTJ5');
        </script>
        
        
        @if(request()->url() == route('login'))
            <title>{{ __('Connexion') }}</title>
        @elseif(request()->url() == route('register'))
            <title>{{ __('Inscription') }}</title>
        @elseif(request()->url() == route('welcome'))
            <title>{{ __('Prestation de services en ligne') }}</title>
        @else
            <title>{{ __('Prestation de services en ligne') }}</title>
        @endif
        
        <!--<link href="https://cdn-cadremploi.carriere.fcms.io/assets/dist/detailOffre-5ba92daf.css" media="all" rel="stylesheet"/>-->
        
        <link href="{{ asset('css/V2/styles.css') }}" rel="stylesheet" media="all" />
        <link href="{{ asset('css/V2/styles_1.css') }}" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" media="all"/>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" media="all"/>
        <link href="{{ asset('css/V2/admin.css') }}" media="all" rel="stylesheet"/>
        
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
            if(Auth::check()){
                $userinfos = new App\Models\Userinfo;
                $userinfos = $userinfos->userfo();
                $userinfos_skills = new App\Models\Userinfos_skill;
                $userinfos_skill = $userinfos_skills->userinfoSkill();
                
                $userinfosSkills = App\Models\Userinfos_skill::with('userinfo','skill')->paginate(10);
                $languagesUserinfos = App\Models\Languages_userinfo::with('language','userinfo')->paginate(25);
            }
            
            $entete = new App\Models\Project;
            $projects = $entete->pour_entete();
        ?>
    
    
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    @include('layouts.V2.nav')
                    
                    <!-- Revu de l'entête -->
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <i class="fa fa-bolt" style="color: black;" aria-hidden="true"></i>&nbsp;&nbsp;
                                <span>NOUVELLES</span>
                            </div>
                            <div class="col-md-10">
                                <div class="marquee-rtl">
                                    <div>
                                        @if (!empty($projects))
                                            @foreach($projects as $donnees)
                                                <a href="{{ route('detail', $donnees->id) }}" class="first" style="font-family: auto;font-family: inherit;color:#30353c;" title="{{ $donnees->projectname }}">{{ $donnees->projectname }}</a>&nbsp;&nbsp;&nbsp;
                                            @endforeach
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- ConveyThis: https://www.conveythis.com/ 
                            <div class="col-md-1" id="language">
                            </div>   -->
                        </div>
                    </div>
                    <!-- Fin de revu de l'entête -->
                    
                    <div class="flash-message text-center">
                        @if(Auth::check() && !Auth::user()->hasVerifiedEmail())
                            <div class="alert alert-danger alert-dismissible fade show">
                                Veuillez vérifier votre adresse e-mail. Un e-mail contenant des instructions de vérification a été envoyé à {{ Auth::user()->email }}.
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {!! session('success_message') !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(Session::has('warning_message'))
                        <div class="alert alert-warning text-center alert-dismissible fade show">
                            {!! session('warning_message') !!}
                            @if(empty(count($userinfos)))
                                <a class="alert-link" href="{{ route('chercheur.form.userinfo_all') }}">Ici</a>.
                            @endif
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(Session::has('error_message'))
                        <div class="alert alert-danger text-center alert-dismissible fade show mt-2">
                                {!! session('error_message') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    
                    
                    
                    @if(Auth::check())
                        @if(empty(count($userinfos)))
                            @if (Auth::user()->hasRole('recruteur'))
                                <div class="boxs-body text-center">
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        Veuillez complèter vos information.
                                        <a class="alert-link" href="{{ route('recruteur.form.userinfos') }}">Ici</a>.
                                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @elseif (Auth::user()->hasRole('chercheur'))
                                <div class="boxs-body text-center">
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        Veuillez complèter vos information.
                                        <a class="alert-link" href="{{ route('chercheur.form.userinfo_all') }}">Ici</a>.
                                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif
                        
                    @yield('content')
                </main>
            </div>
            <div id="layoutDefault_footer">
                @include('layouts.V2.footer')
            </div>
        </div>
        <script>
        
            function copyToClipboard(text) {
              navigator.clipboard.writeText(text).then(function() {
                // Créer un élément de toast
                const toast = document.createElement('div');
                toast.className = 'toast';
                toast.innerText = "Lien copié avec succès!";
                
                // Ajouter le toast au conteneur
                const container = document.getElementById('toast-container');
                container.appendChild(toast);
                
                // Afficher le toast
                setTimeout(() => {
                  toast.classList.add('show');
                }, 100);
                
                // Masquer et supprimer le toast après 3 secondes
                setTimeout(() => {
                  toast.classList.remove('show');
                  setTimeout(() => {
                    container.removeChild(toast);
                  }, 500);
                }, 3000);
                
              }).catch(function(err) {
               // Créer un élément de toast
                const toast = document.createElement('div');
                toast.className = 'toast';
                toast.innerText = "Lien non copié!";
                
                // Ajouter le toast au conteneur
                const container = document.getElementById('toast-container');
                container.appendChild(toast);
                
                // Afficher le toast
                setTimeout(() => {
                  toast.classList.add('show');
                }, 100);
                
                // Masquer et supprimer le toast après 3 secondes
                setTimeout(() => {
                  toast.classList.remove('show');
                  setTimeout(() => {
                    container.removeChild(toast);
                  }, 500);
                }, 3000);
              });
            }
        </script>
      
      <script>
        $('#region').change(function(){
            var myvalue = $("#region option:selected").attr("id");
            var mon_region = $("#region option:selected").attr("value");
            $("#nom_region").val(mon_region);
            $.ajax({url: "recruteur/liste/"+myvalue, success: function(result){
            $("#prefect").html(result);
            document.getElementById('prefecturecss').style.display = "block";
          }});
        });            
    </script>
    
    @include('layouts.V2.scripts')
    </body>
</html>
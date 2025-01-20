<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @if(request()->url() == route('login'))
            <title>{{ __('Connexion') }}</title>
        @elseif(request()->url() == route('register'))
            <title>{{ __('Inscription') }}</title>
        @else
            <title>{{ $title }}</title>
        @endif
        <link href="{{ asset('css/V2/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />
        <link href="{{ asset('css/V2/admin.css') }}" rel="stylesheet" />
        
        <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <section class="bg-white py-5" style="background-color: #f2f6fc!important;">
                        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10  mt-n5">
                            <div class="container-xl px-4">
                                <div class="page-header-content pt-4">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mt-4">
                                            <h1 class="page-header-title">
                                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg></div>
                                                Lancement officiel de Fleuron
                                            </h1>
                                            <div class="page-header-subtitle">Bienvenue sur notre site web de mise en relation des chercheurs d'emploi et des porteurs d'emploi !</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="container-xl px-4 mt-n10 lancement" data-aos="fade-up" id="lancement">
                            <div class="card card-waves mb-4">
                                <div class="card-body p-5">
                                    <div class="row align-items-center justify-content-between mb-5">
                                        <div class="col">
                                            <h2 class="text-primary">########################################!</h2>
                                            <p class="text-gray-700">Trouver le bon emploi ou le candidat idéal peut être un défi. C'est pourquoi nous avons créé cette plateforme pour simplifier le processus et vous aider à trouver rapidement des opportunités d'emploi adaptées à vos besoins.</p>
                                            <p class="text-gray-700">Que vous soyez à la recherche d'un emploi à temps plein, d'un stage, d'un contrat temporaire ou simplement d'une nouvelle expérience professionnelle, notre site est là pour vous soutenir. Nous mettons en relation les chercheurs d'emploi avec des porteurs d'emploi qui offrent des postes dans différents secteurs et domaines d'activité.</p>
                                            <p class="text-gray-700">En tant que chercheur d'emploi, vous pouvez créer un profil détaillé qui met en valeur vos compétences, votre expérience et vos objectifs professionnels. Vous aurez accès à une multitude d'offres d'emploi, avec la possibilité de postuler facilement en ligne. Vous pouvez également recevoir des suggestions personnalisées basées sur votre profil et vos préférences.</p>
                                            <p class="text-gray-700">En tant que porteur d'emploi, vous pouvez publier des offres d'emploi et accéder à une base de candidats qualifiés. Notre système de recherche avancée vous permet de trouver les candidats qui correspondent le mieux à vos critères spécifiques. Vous pouvez gérer vos offres, suivre les candidatures et entrer en contact directement avec les chercheurs d'emploi.</p>
                                        </div>
                                        <div class="col d-none d-lg-block mt-xxl-n4 text-center">
                                            <img class="img-fluid px-xl-4" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/browser-stats.svg" style="max-width: 36rem">
                                        </div>
                                    </div>
                                    
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col d-none d-lg-block mt-xxl-n4 text-center">
                                            <img class="img-fluid px-xl-4" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/data-report.svg" style="max-width: 36rem">
                                        </div>
                                        <div class="col">
                                            <p class="text-gray-700">Nous croyons fermement que la mise en relation des talents et des opportunités est la clé du succès professionnel. Notre équipe dévouée travaille sans relâche pour faciliter cette connexion et rendre votre recherche d'emploi ou de candidat aussi efficace et agréable que possible.</p>
                                            <p class="text-gray-700">Rejoignez-nous dès aujourd'hui et découvrez un monde d'opportunités professionnelles qui vous attendent. Inscrivez-vous gratuitement et commencez à explorer les possibilités offertes par notre site web de mise en relation des chercheurs d'emploi et des porteurs d'emploi.</p>
                                            <p class="text-gray-700">Nous sommes impatients de vous accompagner dans votre parcours professionnel et de vous aider à réaliser vos aspirations. Ensemble, nous pouvons construire un avenir meilleur pour tous.</p>
                                            <p class="text-gray-700">L'équipe du site de mise en relation des chercheurs d'emploi et des porteurs d'emploi.</p>
                                            <button class="btn btn-primary p-3 bn_contact" id="bn_contact">
                                                Rejoignez-nous!
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ms-1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                            </button>
                                        </div>
                                        
                                        <div class="svg-border-rounded text-light">
                                            <!-- Rounded SVG Border-->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-xl px-4 mt-n10 contact" data-aos="fade-up" style="display:none">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="default">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="tab-content" id="cardTabContent">
                                                    <div class="tab-pane py-5 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                                        <div class="row gx-5 justify-content-center">
                                                            <!--<div class="col-lg-8 text-center mb-5">
                                                                <h2>Contactez-nous aux ?</h2>
                                                            </div>-->
                                                            <a href="/lancement"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mouse-pointer"><path d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"></path><path d="M13 13l6 6"></path></svg></a>
                                                            <div class="row gx-5 align-items-center mb-10">
                                                                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                                                                    <!--<div class="section-preheading">Message Us</div>
                                                                    <a href="#!">Start a chat!</a>-->
                                                                </div>
                                                                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                                                                    <div class="section-preheading">Appelez au</div>
                                                                    <a href="#!">+ (228) 99 98 87 20 / 90 65 47 96</a>
                                                                </div>
                                                                <div class="col-lg-4 text-center">
                                                                    <!--<div class="section-preheading">Email</div>
                                                                    <a href="#!"><span class="__cf_email__" data-cfemail="info@fleuron.tg">info@fleuron.tg</span></a>-->
                                                                </div>
                                                            </div>
                                                            <form method="post" action="/contact">
                                                                @csrf
                                                                <div class="row gx-5 mb-4">
                                                                    <div class="col-md-4">
                                                                        <label class="text-dark mb-2" for="inputName">Nom et prénoms</label>
                                                                        <input class="form-control py-4" name="name" id="inputName" type="text" placeholder="KOFFI Abalo" required/>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="text-dark mb-2" for="inputEmail">Email</label>
                                                                        <input class="form-control py-4" name="email" id="inputEmail" type="email" placeholder="name@example.com"required />
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="text-dark mb-2" for="inputEmail">Numéro de téléphone</label>
                                                                        <input class="form-control py-4" name="phone" id="inputTel" type="tel" placeholder="0022890654796" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="text-dark mb-2" for="inputMessage">Message</label>
                                                                    <textarea class="form-control py-3" name="message" id="inputMessage" type="text" placeholder="Votre message..." rows="4" required></textarea>
                                                                </div>
                                                                <div class="card bg-light shadow-none">
                                                                    <div class="card-body d-flex align-items-center justify-content-between p-4">
                                                                        <p class="lead mb-0"><a href="mailto:info@fleuron.tg"><span class="__cf_email__" data-cfemail="info@fleuron.tg">info@fleuron.tg</span></a></p>
                                                                        <button class="btn btn-primary" type="submit">
                                                                            Valider!
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main
            </div>
        </div>
        
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
        <script>
            $(document).on('click','.bn_contact',function(){
            $('.lancement').hide();
            $('.contact').show();
            })
        </script>
        @include('layouts.V2.scripts')
        
    </body>
</html>               
                
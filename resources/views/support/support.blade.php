@extends('layouts.V2.app')
@section('content')
    <section class="bg-white py-5">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg></div>
                                Comment ça marche ?
                            </h1>
                            <div class="page-header-subtitle">Toutes les informations utiles pour utiliser Fleuron avec aisance</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="row">
                @include('support.lateral') 
                <div class="col-lg-9">
                    <div class="default">
                        <div class="card card-angles mb-4">
                            <!--<div class="card-header">-->
                            <!--    Principes-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane py-4 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <!--<h3 class="text-primary">Step 1</h3>
                                                <h5 class="card-title mb-4">Enter your language information</h5>-->
                                                
                                                <h2 class="mb-3">Qu'est-ce que Fleuron ?</h2>
                                                <div class="boxs-body">
                                                    <p><a href="{{ route('welcome') }}" style="color: #346abf;text-decoration: none; background-color: transparent;">Fleuron</a> est un site qui met en relation les clients et les prestataires. La mise en relation est gratuite pour le client <!--<span>, le prestataire doit quant à lui prendre un abonnement pour pouvoir répondre aux appels d'offres des clients</span>-->.
                                                    </p>
                                                    <p>Avec <a href="{{ route('welcome') }}" style="color: #346abf;text-decoration: none; background-color: transparent;">Fleuron</a>, il est possible de trouver facilement un client ou un prestataire.</p>
                                                    <p>Pour en savoir plus sur le mode de fonctionnement, suivez les liens ci-après selon votre profil :</p>
                                                    
                                                    <ul>
                                                        <li>
                                                            <a href="/guide/client" style="color: #346abf;text-decoration: none; background-color: transparent;">Je suis client et je cherche un prestataire</a>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            <a href="/guide/chercheur" style="color: #346abf;text-decoration: none; background-color: transparent;">Je suis prestataire et je cherche des clients</a>
                                                        </li>
                                                    </ul>
                                                
                                                    <p>
                                                        <a href="{{ route('welcome') }}" style="color: #346abf;text-decoration: none; background-color: transparent;">Fleuron</a> permet de trouver facilement un webmaster freelance, un développeur freelance, un web designer freelance ou autres prestataires informatiques indépendant.
                                                    </p>
                                                </div>
                                                
                                                <div class="boxs-footer" style="font-size: 0.75rem;">
                                                    Vous n’avez pas trouvé votre réponse ? <a href="{{ route('contacts') }}">Contactez-nous</a> et nous vous répondrons rapidement.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
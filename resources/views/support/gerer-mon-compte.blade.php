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
                                Comment gérer mon compte ?
                            </h1>
                            <div class="page-header-subtitle">Plus de détails sur comment s'inscrire et se connecter à son compte</div>
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
                        <div class="card mb-4">
                            <!--<div class="card-header">-->
                            <!--    Gérer mon compte-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="container px-5">
                                    <div class="row py-4 align-items-center justify-content-center">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-11" data-aos="fade-up">
                                                <h2 class="mb-3">Comment s'inscrire sur le site ?</h2>
                                                <div class="boxs-body">
                                                   <a href="{{ route('register') }}" target="_blank">Cliquez sur le lien pour vous inscrire</a>.
                                                    <br><br>
                                                    <ul>
                                                        <li>
                                                            Si vous souhaitez poster des projets pour recevoir des offres de prestataire, choisissez "Porteur de projet ou recruteur".
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Si vous souhaitez faire des offres pour réaliser les projets des clients, choisissez "Prestataire ou chercheur d'emploi".
                                                        </li>
                                                    </ul>
                                                    Une fois le formulaire validé, n'oubliez pas de cliquer sur le lien que vous avez reçu par email pour valider votre compte. Ça y est, vous êtes inscrits. Vous pouvez désormais remplir votre profil !
                                                    <br>
                                                </div>
                                                
                                                <br><br>
                                                <div class="boxs-header">
                                                   <h2>J'ai perdu mon mot de passe, que faire ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Pour récupérer votre mot de passe, <a href="{{ route('password.request') }}" target="_blank">suivez ce lien.</a>.
                                                </div>
                                                <br><br>
                                                
                                                <div class="boxs-header">
                                                   <h2>Comment supprimer mon compte ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Pour supprimer votre compte, veuillez vous rendre sur votre menu personnel en haut à droite, pointez le curseur sur le bouton de profil, puis cliquez sur "Supprimer mon compte" en bas puis valider.
                                                </div>
                                                <br><br>
                                                
                                                
                                                <div class="boxs-header">
                                                   <h2>Je ne reçois pas d'email de confirmation ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Pensez à regarder dans les courriers SPAM ou indésirables. Si vraiment vous ne recevez pas l'email, n'hésitez pas à 
                                                <a target="_blank" href="{{ route('contacts') }}">nous contacter</a>.
                                                
                                                </div>
                                                
                                                <div class="boxs-footer mt-4" style="font-size: 0.75rem;">
                                                    Vous n’avez pas trouvé votre réponse ? ​<a href="{{ route('contacts') }}">Contactez-nous</a>​ et nous vous répondrons rapidement.
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
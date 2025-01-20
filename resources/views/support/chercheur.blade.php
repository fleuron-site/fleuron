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
                                Chercheur !
                            </h1>
                            <div class="page-header-subtitle"></div>
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
                            <!--    Principes-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane py-4 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row gx-5 align-items-center justify-content-center px-5">
                                            <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                                                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs"> Développez votre clientèle avec Fleuron</h2>
                                                       
                                                <p class="g-font-size-18--sm">
                                                            <span>Répondez aux appels d'offres</span><br>
                                                Déposez vos devis sur les missions des porteurs de projets
                                                </p>
                                                <p class="g-font-size-18--sm">
                                                            <span>Discutez avec vos prospects</span><br>
                                                Utilisez la messagerie de fleuron.tg pour regrouper toutes vos discussions
                                                </p>
                                                <p class="g-font-size-18--sm">
                                                            <span>Trouvez de nouveaux clients</span><br>
                                                Vous pouvez contacter plusieurs clients par mois
                                                </p><br>
                                                
                                                <h2 class="mb-4 display-6">Faites des devis et remportez des missions</h2>
                                                <p class="lead"><strong>Avec un compte gratuit sur fleuron.tg vous pourrez&nbsp;:</strong></p>
                                                <ul>
                                                    <li>Remplir votre profil</li>
                                                    <li>Recevoir les projets dans vos compétences par email</li>
                                                </ul>
                                                <p class="lead"><strong>Pour répondre aux projets sur fleuron.tg vous devez&nbsp;:</strong></p>
                                                <ul>
                                                    <li>Être une société</li>
                                                    <li>Être un particulier</li>
                                                    <li>Inscription est gratuite</li>
                                                </ul> 
                                                
                                            </div>
                                            <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                                                <div class="content-skewed content-skewed-left"><img class="content-skewed-item img-fluid shadow-lg rounded-3" src="/fleuron/uploads/images/contact.jpg" alt="Détail du projet"/></div>
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
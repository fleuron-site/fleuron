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
                                Comment faire une offre ?
                            </h1>
                            <div class="page-header-subtitle">Voici un guide pour vous aider à postuler aux offres en toute simplicité</div>
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
                            <!--    Faire une offre-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane py-4 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10">
                                                <h2 class="mb-3">Comment postuler à une offre ?</h2>
                                                <div class="boxs-body">
                                                   Pour faire une offre, cliquez sur "Postuler". 
                                                   Ensuite indiquez le montant de votre offre, le nombre de jours nécessaires pour réaliser le projet et décrivez votre proposition.
                                                   <br><br>
                                                   <img src="/fleuron/uploads/images/faireOffre.PNG" style="border-radius:0px 0px 0px 0px; width: 100%;" class="" alt="...">
                                                   <p>
                                                       Note : avant toute chose, vous devez vous s'inscrire en tant que prestataire.
                                                   </p>
                                                   <p>
                                                       Pour que votre offre soit la plus pertinente possible, n'hésitez pas à :
                                                   </p>
                                                   
                                                   <ul>
                                                        <li>
                                                            Détailler les étapes de la réalisation,
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Préciser les garanties que vous apportez,
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Indiquer les outils que vous utilisez,
                                                        </li>
                                                    </ul>
                                                    <!--<ul>
                                                        <li>
                                                            Préciser les réalisations que vous avez déjà faites se rapprochant de la demande,
                                                        </li>
                                                    </ul>-->
                                                    <ul>
                                                        <li>
                                                            Indiquer ce qui ne sera pas compris dans votre prestation,
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Remplir la description de votre profil.
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="boxs-footer" style="font-size: 0.75rem;">
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
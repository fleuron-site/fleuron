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
                                Comment éviter les litiges ?
                            </h1>
                            <div class="page-header-subtitle">Quelques principes pour minimiser les incompréhensions entre prestataires et clients</div>
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
                            <!--    Eviter les litiges-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane py-4 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <h2 class="mb-3">Comment éviter les litiges ?</h2>
                                                <div class="boxs-body">
                                                   Les litiges sont souvent le résultat suite d'une incompréhension dans le cahier des charges soit d'une manque de communication. 
                                                   Nous invitons donc les porteurs de projets à décrire le plus précisément possible leurs besoins et les prestataires à ne pas 
                                                   hésiter à reformuler les besoins pour une meilleure compréhension. Par ailleurs, indiquez toutes les étapes dans la description du projet. 
                                                   Ainsi en cas de litige, notre équipe pourra consulter le projet publié afin de pouvoir arbitrer le plus justement possible.
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
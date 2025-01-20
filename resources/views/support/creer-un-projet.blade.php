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
                                Comment créer un projet ?
                            </h1>
                            <div class="page-header-subtitle">Une offre à publier ? Cette section vous explique tout le processus</div>
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
                            <!--    Créer un projet-->
                            <!--</div>-->
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane py-4 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10">
                                                <h2 class="mb-3">Comment créer un projet ?</h2>
                                                <div class="boxs-body">
                                                   Vous pouvez déposer gratuitement votre projet sur <a href="{{ route('welcome') }}" style="color: #346abf;text-decoration: none; background-color: transparent;">fleuron.tg</a>.
                                                    <br><br>
                                                    <ul>
                                                        <li>
                                                            Indiquez le pays de residence;
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Indiquez un titre représentatif de la prestation que vous attendez (ex : "Conception de site sous Drupal");
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Faites une description la plus représentative possible de votre projet pour aider les prestataires dans leur devis;
                                                        </li>
                                                    </ul>
                                                    <!--<ul>
                                                        <li>
                                                            Sélectionnez jusqu'à 5 domaines de compétences requis pour la réalisation de votre projet;
                                                        </li>
                                                    </ul>-->
                                                    <ul>
                                                        <li>
                                                            Précisez une marge budgetaire à titre indicatif de votre demande;
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Joindre un fichier .pdf ou .docx si necessaire pour votre projet;
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            Vérifiez les informations que vous avez saisies, puis validez votre projet.
                                                        </li>
                                                    </ul>
                                                    
                                                    <br>
                                                    
                                                    <img src="/fleuron/uploads/images/formProjet.png" style="border-radius:0px 0px 0px 0px; width: 100%;" class="" alt="...">
                                                    
                                                </div>
                                                
                                                <br>
                                                <div class="boxs-header">
                                                   <h2>Comment bien décrire mon projet ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Avant de déposer votre projet gratuitement sur fleuron.tg, voici quelques conseils de rédaction :
                                                    <br>
                                                    <br>
                                                    <ol>
                                                        <li>Décrivez votre projet au point où il est actuellement,</li>
                                                        <li>Décrivez le travail que vous souhaitez voir effectué par le prestataire,</li>
                                                        <li>Indiquez vos autres souhaits concernant votre relation avec le prestataire: les compétences particulières que vous recherchez, le délai de réalisation du projet etc.</li>
                                                    </ol>
                                                    <p>
                                                        Recommandation : renseignez cette partie de façon méticuleuse et si possible exhaustive pour permettre au prestataire de chiffrer précisément la réalisation de votre projet.
                                                    </p>
                                                    <p>
                                                        N'hésitez pas à ajouter des liens de réalisations similaires à votre projet. L'idéal est de compléter votre description en joignant un cahier des charges précis en fichier pdf ou docx.
                                                    </p>
                                                </div>
                                                
                                                <div class="boxs-header">
                                                   <h2>J'ai créé mon projet mais il n'apparait pas dans fleuron.tg ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Une fois validé, votre projet est en attente de publication pour revue par notre équipe de modération. Il est publié sous une vingtaine de minutes
                                                </div>
                                                
                                                
                                                <div class="boxs-header">
                                                   <h2>Je n'arrive pas à créer mon projet ?</h2>
                                                </div>
                                                <div class="boxs-body">
                                                    Pensez à valider votre inscription en cliquant sur le lien que vous avez reçu par email. Si vous n'avez pas reçu cet email, veuillez vérifier dans votre dossier SPAM ou 
                                                    <a target="_blank" href="{{ route('contacts') }}" style="text-decoration: none; background-color: transparent;">nous contacter</a>  en précisant bien votre problème.
                                                
                                                
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
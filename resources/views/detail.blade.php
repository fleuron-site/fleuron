@extends('layouts.V2.app')

@section('content')

    <!-- Lien récuperé pour partage sur les réseaux sociaux --> 

    <?php

        $url = "https://fleuron.tg/offre/".$donnees->id."/detail";

    ?>

    <span id="siteUrl">{{ $url }}</span></p>  

    

    <section  class="bg-white py-4">

        <header class="page-header page-header-light bg-light pb-10  mt-n5"> 

            <div class="container-xl px-4">

                <div class="page-header-content pt-4">

                    <div class="row align-items-center justify-content-between">

                        <div class="col-auto mt-4">

                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                {{ $donnees->name }}

                            </h1>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-3 mb-5">

                    <div class="nav-sticky">

                        <div class="card mb-4">

                            <div class="card-body">

                                <ul class="list-group list-group-flush list-group-careers mb-3">

                                    <li class="list-group-item pt-0">

                                        <a class="small" href="{{ route('offres') }}" style="font-size: 1rem;">

                                            <i class="fas fa-arrow-left me-1"></i>

                                            <strong>Retour aux offres</strong>

                                        </a>

                                    </li>

                                    <li class="list-group-item">

                                        @if($donnees->categorie=='P')

                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <strong style="color:#191a1b;">Budget :</strong> <span>&nbsp;&nbsp;{{ $donnees->prix }}</span> à

                                                    <span>{{ $donnees->prixmax }}</span>Franc CFA

                                                </div>

                                            </div>

                                        @else

                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <strong style="color:#191a1b;">Poste basé :</strong> <span>&nbsp;&nbsp;{{ $donnees->Country->namecountry }}</span>

                                                </div>

                                            </div>

                                        @endif

                                        <i class="fas fa-globe fa-fw text-gray-400"></i>

                                    </li>

                                    <li class="list-group-item">

                                        <?php $today = date('Y-m-d H:i:s'); ?>

                                        @if($donnees->datexpir < $today)

                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <span style="color: red;">Cette offre est cloturée</span>

                                                </div>

                                            </div>

                                        @else

                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <strong style="color:#191a1b;">Expire le :</strong>&nbsp;&nbsp;  {{ $donnees->datexpir }}

                                                </div>

                                            </div>

                                        @endif

                                        <i class="fas fa-clock fa-fw text-gray-400"></i>

                                    </li>

                                    <?php $today = date('Y-m-d H:i:s'); ?>

                                    @if($donnees->datexpir > $today)

                                        <li class="list-group-item" data-bs-toggle="collapse" href="#collapseExamplee" role="button" aria-expanded="false" aria-controls="collapseExample">

                                            <strong style="color:#191a1b;">Partagez l'offre!</strong>

                                            <span><svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M hhikbc"><path d="M18 16c-.79 0-1.5.31-2.03.81L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.53.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.48.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.05 4.12c-.05.22-.09.45-.09.69 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3zm0-12c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM6 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"></path></svg></span>

                                        </li>

                                    @endif

                                </ul>

                            </div>

                        </div>

                        

                        <div class="collapse mb-3" id="collapseExamplee">

                            <div class="card card-body">

                                <div class="row">

                                    <div class="col-md-12 mb-2">

                                        <a href="https://api.whatsapp.com/send?text={{$url}}" target="_blanc">

                                            <button class="button share-button whatsapp-share-button whatsapp" style="border: none;background-color: #60e190;text-align: left;color: #fff;">

                                                <i class="fa-brands fa-whatsapp fa-fw"></i>

                                                <span class="icon-name">whatsapp</span>

                                            </button>

                                        </a>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12 mb-2">

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blanc">

                                            <button class="button share-button facebook-share-button facebook" style="border: none;background-color: #7d99d5;text-align: left;color: #fff;">

                                                <i class="fa-brands fa-facebook-f fa-fw"></i>

                                                <span class="icon-name">facebook</span>

                                        </button>

                                        </a>

                                    </div>

                                

                                </div>

                                <div class="row">

                                    <div class="col-md-12  mb-2"> 

                                        <a href="https://twitter.com/intent/tweet?url={{$url}}" target="_blanc">

                                            <button class="button share-button twitter-share-button twitter" style="border: none;background-color: #6bc6ff;text-align: left;color: #fff;">

                                                <svg class="svg-inline--fa fa-x-twitter fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="x-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg>

                                                <span class="icon-name">twitter</span>

                                            </button>

                                        </a>

                                    </div>

                                </div>

                                <div class="row">

                                    <div > 

                                        <button type="button" class="col-md-12"  onclick="copyToClipboard('<?php echo $url; ?>')" style="background-color: blue;text-align: left;border:none;color: #fff;"><i class="fa fa-copy"></i><span class="icon-name">Copier le lien</span></button>

                                    </div>

                                </div>

                            </div>

                        </div>

                        

                        

                        <strong class="icon-name">COMMENTAIRES RÉCENTS</strong>

                        

                        <?php

                            $comment = new App\Models\Commentaire;

                            $shows = $comment->show_all();

                        ?>

                        @if($shows->count() > 0 )

                            @foreach($shows as $commente)

                                <div class="row">

                                    <div class="col-lg-12">

                                        <a class="list-group-item list-group-item-action py-2" href="{{ route('detail', $commente->project_id) }}">

                                            <div class="d-flex justify-content-between">

                                                <div class="me-4 d-flex">

                                                    <div class="icon-stack icon-stack bg-green-soft text-green flex-shrink-0 me-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>

                                                    <div>

                                                        <h6>{{ $commente->user->last_name }} {{ $commente->user->first_name }}</h6>

                                                        <p class="card-text"><?php echo substr($commente->message, 0, 20)."..." ?></p>

                                                    </div>

                                                </div>

                                                <div class="small text-gray-400 flex-shrink-0 text-end">

                                                    {{ $commente->created_at->diffForHumans() }}

                                                </div>

                                            </div>

                                        </a>

                                    </div>

                                </div>

                            @endforeach

                        @else

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="d-flex justify-content-between">

                                        <div class="d-flex p-2">

                                            <span> Pas de commentaire disponible!</span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

                <div class="col-lg-1">

                </div>

                <div class="col-lg-8">

                    <div class="default">

                        <div class="card card-angles mb-4">

                            <div class="card-body">

                                <div class="tab-content" id="cardTabContent">

                                    <div class="tab-pane py-5 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">

                                        <div class="row justify-content-center">

                                            <div class="col-xl-10">

                                                <!--<h1 class="mb-4">{{ $donnees->name }}</h1>-->
                                                @if($donnees->categorie == "E" || $donnees->categorie == 'EE')
                                                    <img class="img-fluid mx-auto" src="/uploads/photoreseaux/{{ $donnees->imageurl->img }}" alt="" style="width:100%;">
                                                @endif
                                                <p class="lead mb-4"><?php echo $donnees->description ?></p>

                                                
                                                @if ($donnees->file)
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <a style="font-size: x-large" href="{{ asset('storage/' . $donnees->file) }}" target="_blank">Voir le document joint.</a>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="row mb-4 mt-4">

                                                    <div class="col-md-6">

                                                        <div class="small flex-shrink-0 text-end" style="">

                                                            <div class="d-flex justify-content-between mt-4" style="padding-top: 15px;">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6" style="text-align: right; margin: inherit;">

                                                        <div class="btn-group dropstart">

                                                          <button class="btn btn-outline-light rounded-circle" style="border: 0.5px solid;padding: 10px;" data-bs-toggle="dropdown" aria-expanded="false">

                                                                <div jsname="s3Eaab" class="VfPpkd-Bz112c-Jh9lGc"></div>

                                                                <div class="VfPpkd-Bz112c-J1Ukfc-LhBDec"></div>

                                                                <span class="" aria-hidden="true">

                                                                    <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M hhikbc">

                                                                        <path d="M18 16c-.79 0-1.5.31-2.03.81L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.53.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.48.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.05 4.12c-.05.22-.09.45-.09.69 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3zm0-12c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM6 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"></path>

                                                                    </svg>

                                                                </span>

                                                                <div class="VfPpkd-Bz112c-RLmnJb"></div>

                                                          </button>

                                                              

                                                          <ul class="dropdown-menu me-2">

                                                            <li>

                                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{$url}}" target="_blanc">

                                                                    <i class="fa-brands fa-whatsapp fa-fw"></i>&nbsp;&nbsp;whatsapp

                                                                </a>

                                                            </li>

                                                            <hr style="margin: 0rem 0;">

                                                            <li>

                                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blanc">

                                                                   <i class="fa-brands fa-facebook-f fa-fw"></i>&nbsp;&nbsp;facebook

                                                                </a>

                                                            </li>

                                                            <hr style="margin: 0rem 0;">

                                                            <li>

                                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{$url}}&text=TITRE_DU_CONTENU" target="_blanc">

                                                                    <svg class="svg-inline--fa fa-x-twitter fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="x-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg>

                                                                    &nbsp;&nbsp;twitter

                                                                </a>

                                                            </li>

                                                            <hr style="margin: 0rem 0;">

                                                            <li>

                                                                <button type="button" class="dropdown-item" onclick="copyToClipboard('<?php echo $url; ?>')">

                                                                    <i class="fa fa-copy"></i>&nbsp;&nbsp;Copier le lien

                                                                </button>

                                                            </li>

                                                          </ul>

                                                        </div>

                                                        <div class="border-0 bouton mt-1">

                                                            <?php $today = date('Y-m-d H:i:s'); ?>

                                                            @if(Auth::check())

                                                                @if($donnees->categorie == 'P' && Auth::user()->hasRole('chercheur'))

                                                                    @if($donnees->datexpir > $today && $donnees->realiser== 0)

                                                                        <a class="btn btn-outline-primary fw-500 ms-2" id="postt" data-id="{{ $donnees->id }}" style="padding: 10px;" title="Cliquez pour postuler">
                                                                            Postuler
                                                                        </a>

                                                                    @endif

                                                                @endif

                                                            @elseif($donnees->categorie == 'P' || $donnees->categorie == 'EE')

                                                                @if($donnees->datexpir > $today && $donnees->realiser== 0)

                                                                    <a class="btn btn-primary fw-500 ms-2" id="postt" data-id="{{ $donnees->id }}" style="padding: 10px;" title="Cliquez pour postuler">
                                                                        Postuler
                                                                    </a>

                                                                @endif

                                                            @endif

                                                        </div>

                                                    </div>

                                                </div>

                                                

                                                <!--Affiche alerte après avoir copié le lien de l'offre-->

                                                <div class="toast-container" id="toast-container"></div>

                                                

                                            </div>

                                        </div>

                                        

                                       <?php

                                            $comment = new App\Models\Commentaire;

                                            $commentes = $comment->commentaire($donnees->id);

                                        ?>

                                        @foreach($commentes as $commente)

                                            <div class="row justify-content-center mt-2">

                                                <div class="col-xl-10">

                                                    <div class="list-group-item list-group-item-action py-2">

                                                        <div class="d-flex justify-content-between">

                                                            <div class="me-4 d-flex">

                                                                <div class="icon-stack icon-stack bg-green-soft text-green flex-shrink-0 me-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>

                                                                <div>

                                                                    <h6>{{ $commente->user->last_name }} {{ $commente->user->first_name }}</h6>

                                                                    <p class="card-text">{{ $commente->message }}</p>

                                                                </div>

                                                            </div>

                                                            <div class="small text-gray-400 flex-shrink-0 text-end">

                                                                {{ $commente->created_at->diffForHumans() }}

                                                                <br>

                                                                <a href="#"><div class="badge bg-green-soft rounded-pill text-green">Votre avis!</div></a> 

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach

                                        <div class="row justify-content-center  mt-4">

                                            <div class="col-xl-10">

                                                <strong> Commentaire <span class="text-red">*</span> </strong><br>

                                                <form method="POST"  class="mt-2" action="{{ route('commentaire.store') }}" accept-charset="UTF-8" class="form-horizontal">

                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="project_id" value="{{ $donnees->id }}">

                                                    <div  class="row mb-1">

                                                        <div class="col-md-10">

                                                            <div id="commentError" style="color: red;"></div>

                                                        </div>

                                                        <div class="col-md-2">

                                                            <strong style="float:right;"><span id="comp">0</span>/250</strong>

                                                        </div>

                                                    </div>

                                                    <textarea id="comment" class="form-control mb-2" name="message" rows="4" maxlength="250" placeholder="Votre commentaire ici" required>{{ old('content', Session::get('comment_content', '')) }}</textarea>

                                                    <button class="btn btn-primary btn-sm me-2">Laisser un commentaire!</button>

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

        </div>

        

        @include('layouts.V2.banderole')

    </section>

    

    <script>

        $(document).on('click','#postt',function(){            

        var activeProject=$(this).attr("data-id");

        $.ajax({

            url: '',

            type:    'GET',

            data:    { src: 'show' },

            success: function(response) {

               window.location.href = "/chercheur/offre/"+activeProject+"/postuler";

            }

            });

        })

        document.getElementById('comment').addEventListener('input', function() {

            var comment = this.value;

            var minChars = 10; // Nombre minimum de caractères

            document.getElementById('comp').textContent = comment.length;

            if (comment.length < minChars) {

                document.getElementById('commentError').textContent = 'Le commentaire est trop court.';

            } else {

                document.getElementById('commentError').textContent = '';

            }

        });

    </script>



@endsection                

                
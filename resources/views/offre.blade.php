@extends('layouts.V2.app')

@section('content')

    <script>

            var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?65481';

            var s = document.createElement('script');

            s.type = 'text/javascript';

            s.async = true;

            s.src = url;

            var options = {

              "enabled":true,

              "chatButtonSetting":{

                  "backgroundColor":"#4dc247",

                  "ctaText":"",

                  "borderRadius":"25",

                  "marginLeft":"0",

                  "marginBottom":"50",

                  "marginRight":"50",

                  "position":"right"

              },

              "brandSetting":{

                  "brandName":"FLEURON",

                  "brandSubTitle":"Répond généralement dans la journée",

                  "brandImg":"https://cdn.clare.ai/wati/images/WATI_logo_square_2.png",

                  "welcomeText":"Salut!\nComment puis-je vous aider?",

                  "messageText":"Bonjour, j'ai une question sur",

                  "backgroundColor":"#0a5f54",

                  "ctaText":"Démarrer la discussion",

                  "borderRadius":"25",

                  "autoShow":false,

                  "phoneNumber":"22899988720"

              }

            };

            s.onload = function() {

                CreateWhatsappChatWidget(options);

            };

            var x = document.getElementsByTagName('script')[0];

            x.parentNode.insertBefore(s, x);

        </script>

        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <section class="bg-white py-5">

        
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                Les offres à la une
                            </h1>
                            <div class="page-header-subtitle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-3 mb-3" data-aos="fade-up">

                    <div class="nav-sticky">
                        
                        <div class="card">

                            <div class="card-body">

                                <ul class="nav flex-column" id="stickyNav">

                                    <li class="nav-item">

                                        <h2 class="mb-3" style="font-size: revert-layer;font-weight: revert-layer;text-align: right;">Consulter les offres disponibles selon nos domaines d'intervention</h1>
                                    </li>

                                    <hr class="sidebar-divider">

                                    @foreach($skills as $skill)

                                        <li class="nav-item">

                                            <form method="POST" action="{{ route('searchoffre') }}">

                                            {{ csrf_field() }}

                                                <a hreh="javascript:void(0);" class="nav-link">

                                                    <input class="form-control btn-key" name="employee_search" type="hidden" value="{{ $skill->name }}">

                                                    <button type="submit" title="Rechercher une offre" name="offre" style="background: transparent;border: none;">

                                                        <img src="{{ asset('storage/'.$skill->picture) }}" alt="" style="width: 20px;height: 20px;">&nbsp;&nbsp;

                                                        {{ $skill->name }} 

                                                    </button>

                                                </a>

                                            </form>

                                        </li>

                                        <hr class="sidebar-divider">

                                    @endforeach

                                    <li class="nav-item">

                                        <form method="POST" action="{{ route('offres') }}">

                                            <a hreh="javascript:void(0);" class="nav-link">

                                                {{ csrf_field() }}

                                                <input class="form-control btn-key" name="employee_search" type="hidden" value="">

                                                <button type="submit" title="Rechercher une offre" name="offre" style="background: transparent;border: none;">

                                                    <i class="fa fa-check-all" style="font-size: 1.4rem;"></i>&nbsp;&nbsp;

                                                    <span style="margin-top: -3px;">

                                                        Toutes les offres

                                                    </span> 

                                                </button>

                                            </a>

                                        </form>

                                    </li>

                                    <hr class="sidebar-divider">

                                    <li class="nav-item">

                                        <form method="POST" action="{{ route('offres') }}">

                                            <a href="#" class="nav-link">

                                                {{ csrf_field() }}

                                                <input class="form-control btn-key" name="archive" type="hidden" value="archive">

                                                <button type="submit" title="Rechercher une offre" style="background: transparent;border: none;">

                                                    <i class="fas fa-archive text-dark" style="font-size: 1.4rem;"></i>&nbsp;&nbsp;

                                                    <span style="margin-top: -3px;">

                                                        Offres archivées

                                                    </span> 

                                                </button>

                                            </a>

                                        </form>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div class="tw-pb-12">

                            <h5 class="display-9 tw-font-semibold tw-text-dark justify-content-center mt-5">Êtes-vous à la recherche d'un professionnel qualifié pour votre projet ?</h5>

                            <p class="justify-content-center" style="text-align:justify;">Fleuron peut rapidement vous mettre en contact avec des prestataires certifiés et vous aider à choisir celui qui vous conviendrait. Confidentialité et professionnalisme garantis.</p>

                            <p><a class="fw-500 ms-lg-4 btn btn btn-outline-primary" data-controller="launch-fast" href="{{ route('recruteur.project.create') }}">Publier votre projet</a></p>

                        </div>

                    </div>
                </div>

                <div class="col-lg-1" data-aos="fade-up">

                </div>

            <div class="col-lg-8" data-aos="fade-up">

                <!-- <h2 class="mb-3" style="font-size: xx-large;font-weight: bold;">Les offres à la une</h1>  -->

                <?php

                    if (count($projects) != 0) {

                ?>  

                        @foreach($projects as $donnees)

                            <!-- Lien récuperé pour partage sur les réseaux sociaux --> 

                           <?php

                                $url = "https://fleuron.tg/offre/".$donnees->id."/detail";

                            ?>

                            <span id="siteUrl">{{ $url }}</span>
                        

                            <div class="card mb-3">

                                <div class="list-group list-group-flush">

                                    <a class="list-group-item list-group-item-action py-4" href="{{ route('detail', $donnees->id) }}">

                                        <div class="d-flex justify-content-between">

                                            <div class="me-4 d-flex">

                                                <div class="icon-stack icon-stack bg-green-soft text-green flex-shrink-0 me-4" style="background-color: #ffffff !important;">

                                                    <img style="width: 30px;height: 30px;" src="{{ asset('storage/' .$donnees->picture) }}" title="{{ $donnees->namee }}" alt="Skill">

                                                </div>

                                                <div>

                                                    <h6>{{ $donnees->projectname }}</h6>

                                                    <div class=" text-green">

                                                        @if($donnees->categorie=='P')

                                                            <strong style="color:#191a1b;">Budget :</strong>

                                                            <div class="badge" style="color:#0061f2">

                                                                <span>{{ $donnees->prix }}</span> à 

                                                                <span>{{ $donnees->prixmax }}</span> Franc CFA;

                                                            </div>

                                                        @endif

                                                        <?php $today = date('Y-m-d H:i:s'); ?>

                                                        @if($donnees->datexpir < $today)

                                                            <div class="badge bg-green-soft rounded-pill">

                                                                <span style="color: red;">Cette offre est cloturée</span>

                                                            </div>

                                                        @else

                                                            <span>Expire le: {{ $donnees->datexpir }}</span>

                                                        @endif

                                                    </div>

                                                    <p class="card-text"><?php echo substr($donnees->description, 0, 225)."..." ?></p>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <div class="row mt-1 mb-1">

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

                                                            <a class="btn btn-outline-primary fw-500 ms-2" style="padding: 10px;" id="postt" data-id="{{ $donnees->id }}"  title="Cliquez pour postuler">
                                                                Postuler
                                                            </a>

                                                        @endif

                                                    @endif

                                                @elseif($donnees->categorie == 'P' || $donnees->categorie == 'EE')

                                                    @if($donnees->datexpir > $today && $donnees->realiser== 0)

                                                        <a class="btn btn-primary fw-500 ms-2" style="padding: 10px;" id="postt" data-id="{{ $donnees->id }}"  title="Cliquez pour postuler">
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

                        @endforeach

                        <?php

            

                    }else{?>

                        <div class="row">

                            <span style="font-size:1.5rem;">

                                Aucune offre disponible !

                            </span>

                        </div>

                    <?php }?> 

                    <div class="d-flex mt-4">

                        {!! $projects->links() !!}

                    </div>

                    

                    

                    <div class="mt-4" style="color: #5c5857;font-size: 1.3rem;font-style: italic;">

                        Rejoignez notre communaut&eacute; et soyez alert&eacute;s de toutes nos publications

                    </div>

                    

                    <form method="POST" action="{{ route('newsletter') }}" accept-charset="UTF-8" id="create_project_form" class="form-horizontal" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="input-group input-group-joined mt-2"> 

                            <input class="form-control pe-0" type="email" name="email" placeholder="Votre addresse de courrier électronique..." aria-label="Search">

                            <button class="search" type="submit">

                                <span class="input-group-text">

                                    <i class="fa fa-search"></i>

                                </span>

                            </button>

                        </div>

                    </form>

                          

                </div>

                

            </div>
            @include('layouts.V2.banderole')

        </div>

    </section>

    

    <!-- Postuler à l'offre -->

   





    <!-- Modal -->

    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-sm">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Votre compte fleuron.tg</h4>

                </div>

                <div class="modal-body">

                    <span style="text-align: justify;">pour effectuer cette action vous devez avoir un compte (gratuit) et être identifié sur le site.</span>

                </div>

                <div class="modal-footer">

                    <a class="btn btn-outline-primary btn-lg btn-block cn" id="registration-link" style="color: blue;" href="{{ route('register') }}">Inscription gratuite</a>

                    <a class="btn btn-primary btn-lg btn-block cm" href="{{ route('login') }}" style="color: #121212;">Se connecter</a>

                </div>

            </div>

        </div>

    </div>

    

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    

        

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    

    <script type="text/javascript">

        $(document).ready(function() {

            $( "#search-input" ).autocomplete({

                source: function(request, response) {

                    $.ajax({

                        url: "/autocomplete_kills",

                        data: {

                                term : request.term

                        },

                        dataType: "json",

                        success: function(data){

                           var resp = $.map(data,function(obj){

                                return obj.description;

                        });

          

                       response(resp);

                        }

                    });

                },

                minLength: 1

            });

        });

    </script>

    

    <script type="text/javascript">

        $(document).ready(function() {

            $( "#search-pays" ).autocomplete({

                source: function(request, response) {

                    $.ajax({

                        url: "/autocomplete_pays",

                        data: {

                                term : request.term

                        },

                        dataType: "json",

                        success: function(data){

                           var resp = $.map(data,function(obj){

                                return obj.namecountry;

                        });

          

                       response(resp);

                        }

                    });

                },

                minLength: 1

            });

        });

    </script>



    

    

    <script>

        $('#myModall').on('show.bs.modal', function(e) {

            var link = $(e.relatedTarget);

            var id = link.data('myid');

            var modal = $(this);            

            modal.find('.modal-body #myid').val(id);

        });

    </script>

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

    </script>

@endsection
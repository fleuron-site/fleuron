@extends('layouts.V2.app')

@section('content')

    <style>

        .hh {

        font-size: xxx-large;

        color: black;

        text-decoration: overline;

        }

        

        .btn_offre{

            border: none;

            border-radius: 10px;

            padding: 10px;

            color: blue;

            background-color: #ffffff;

        }

        

    </style>

    

    <!-- Page Header-->

    <header class="page-header-ui page-header-ui-light bg-white">

        <div class="page-header-ui-content pt-5 mt-n10">

            <div class="container px-5">

                <div class="row gx-5 align-items-center">

                    <div class="col-lg-6" data-aos="fade-up">

                        <h1>Trouvez un professionel qualifié pour votre projet !</h1>

                        <p class="page-header-ui-text mb-5">Recherchez-vous une personne qualifiée et digne de confiance pour vous aider à atteindre vos objectifs ? 

                        Connectez-vous dès maintenant à des centaines de programmeurs, graphistes, rédacteurs…</p>

                        <div class="d-flex flex-column flex-sm-row">

                            <a href="{{ route('login') }}" class="btn btn btn-outline-primary fw-500 me-sm-3 mb-3 mb-sm-0">

                                Publier une offre ?

                            </a>

                            <a href="{{route('principeFonctionnement')}}" class="btn btn btn-primary-soft fw-500" target="_blank">Comment ça marche ?</a>

                        </div>

                    </div>

                    <div class="col-lg-6 d-lg-block" data-aos="fade-up" data-aos-delay="100"><img class="img-fluid mt-5" src="{{ asset('assets/img/illustrations/relation.webp') }}" alt="..." style="border-radius: 50px;"  width="600" height="200"/></div>

                </div>

            </div>

        </div>

    </header>

    <section class="bg-white py-5">

        <div class="container px-5" data-aos="fade-up">

            <h1 class="mt-n5 mb-5 text-center hh">Nos domaines d'intervention</h1>

            <div class="row align-items-center justify-content-center">

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Toutes les offres</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/recherche.webp') }}" alt="" width="50" height="50"></p>

                    <a href="{{ route('offres') }}" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                        Voir les offres

                    </a>

                </div>

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Développement d'applications</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/1636721551.webp') }}" alt="" width="50" height="50"></p>

                    <form method="POST" action="{{ route('searchoffre') }}">

                    {{ csrf_field() }}

                        <input class="form-control btn-key" name="employee_search" type="hidden" value="Developpement">

                        <button type="submit" name="offre" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                            Voir les offres

                        </button>

                    </form>

                </div>

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Services</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/1636721919.webp') }}" alt="" width="50" height="50"></p>

                    <form method="POST" action="{{ route('searchoffre') }}">

                    {{ csrf_field() }}

                        <input class="form-control btn-key" name="employee_search" type="hidden" value="Services">

                        <button type="submit" name="offre" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                            Voir les offres

                        </button>

                    </form>

                </div>

                    <!--</div>

                    <div class="row gx-5">-->

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Système d'entreprise</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/1637975109.webp') }}" alt="" width="50" height="50"></p>

                    <form method="POST" action="{{ route('searchoffre') }}">

                    {{ csrf_field() }}

                        <input class="form-control btn-key" name="employee_search" type="hidden" value="Systèmes d'entreprise">

                        <button type="submit" name="offre" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                            Voir les offres

                        </button>

                    </form>

                </div>

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Graphisme</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/1636722161.webp') }}" alt="" width="50" height="50"></p>

                    <form method="POST" action="{{ route('searchoffre') }}">

                    {{ csrf_field() }}

                        <input class="form-control btn-key" name="employee_search" type="hidden" value="Graphisme">

                        <button type="submit" name="offre" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                            Voir les offres

                        </button>

                    </form>

                </div>

                <div class="col-md-2 mb-4 text-center">

                    <h2 class="mb-4">Web</h2>

                    <p class="mb-2"><img src="{{ asset('storage/uploads/avatars/1636722320.webp') }}" alt="" width="50" height="50"></p>

                    <form method="POST" action="{{ route('searchoffre') }}">

                    {{ csrf_field() }}

                        <input class="form-control btn-key" name="employee_search" type="hidden" value="Web">

                        <button type="submit" name="offre" class="btn btn-lg btn-primary-soft fw-500 btn_offre">

                            Voir les offres

                        </button>

                    </form>

                </div>

            </div>

        </div>

        @include('layouts.V2.banderole')

    </section>

    

    

    <!-- Postuler à l'offre -->

        <!-- <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <span>

                            Postuler

                        </span>

                    </div>

                    <div class="modal-body">

                        <form method="POST" action="{{ route('chercheur.projet.post') }}" enctype="multipart/form-data" accept-charset="UTF-8" id="formmm" class="form-horizontal">

                            @csrf    

                            

                            include ('candidatures.form')

                            

                            <input hidden="true"   type="number" id="myid" name="project_id">

                            <div class="boxs-footer text-right" >

                                <button type="submit" class="btn detail">Valider</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div> -->





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

        

        

        <script>

            $('#myModall').on('show.bs.modal', function(e) {

                var link = $(e.relatedTarget);

                var id = link.data('myid');

                var modal = $(this);            

                modal.find('.modal-body #myid').val(id);

            });

        </script>

        <script>

            $(document).on('click','#post',function(){            

            var activeProject=$(this).attr("data-id");

            $.ajax({

                url: '',

                type:    'GET',

                data:    { src: 'show' },

                success: function(response) {

                   window.location.href = "https://fleuron.tg/chercheur/"+activeProject+"/detail";

                }

            });

            })

        </script>

        

        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@endsection
@extends('layouts.V2.app')

@section('content')

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
                            Contactez-nous

                        </h1>

                        <div class="page-header-subtitle">Répondre à vos préoccupations fait notre joie. 24/24 et 7/7</div>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <div class="container-xl px-4 mt-n10" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12">

                <div class="default">

                    <div class="card mb-4">

                        <div class="card-body">

                            <div class="p-3 text-center">
                                <a class="btn btn-icon btn-facebook mx-1" href="https://www.facebook.com/FleuronTg"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
                                <a class="btn btn-icon btn-twitter mx-1" href="https://twitter.com/FleuronTg"><svg class="svg-inline--fa fa-x-twitter fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="x-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>xx</svg></a>
                                <a class="btn btn-icon btn-google mx-1" href="https://www.youtube.com/@FleuronTg"><i class="fab fa-youtube fa-fw fa-sm"></i></a>
                            </div>

                            <form method="post" action="/contact" class="p-4">

                                @csrf

                                <div class="row mb-4">

                                    <div class="col-xl-6 mb-2">

                                        <label class="text-dark" for="inputName">Nom && prénom(s)</label>

                                        <input class="form-control py-4" name="name" id="inputName" type="text" placeholder="KOFFI Abalo" required/>

                                    </div>

                                    <div class="col-xl-6 mb-2">

                                        <label class="text-dark" for="inputEmail">Adresse email</label>

                                        <input class="form-control py-4" name="email" id="inputEmail" type="email" placeholder="name@example.com"required />
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-12 mb-2">

                                        <label class="text-dark" for="inputEmail">Numéro de téléphone...</label>

                                        <input class="form-control py-4" name="phone" id="inputTel" type="tel" placeholder="0022890654796" required/>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-xl-12 mb-2">
                                        <label class="text-dark" for="inputMessage">Message</label>

                                        <textarea class="form-control py-3" name="message" id="inputMessage" type="text" placeholder="Votre message..." rows="4" required></textarea>

                                    </div>
                                </div>

                                <div class="bg-white shadow-none">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <p>
                                            <strong style="font-size:2em;"><i class="fa fa-phone" aria-hidden="true"></i></strong> &#160; &#160; 00228 90 65 47 96
                                        </p>

                                        <button class="btn btn-outline-primary" type="submit">

                                            Envoyer votre message

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

    @include('layouts.V2.banderole')

</section>

@endsection                

                
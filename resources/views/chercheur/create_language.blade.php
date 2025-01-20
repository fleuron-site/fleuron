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
                                 Mes langues

                            </h1>

                            <div class="page-header-subtitle"></div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                @include('commun.lateral') 

                <div class="col-lg-9">

                    <div class="card mb-4">

                        <div class="card-body">

                            <div class="tab-content" id="cardTabContent">

                                <div class="tab-pane py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">

                                    <div class="row justify-content-center">

                                        <form method="POST" action="{{ route('chercheur.languages_userinfos.languages_userinfo.store') }}" accept-charset="UTF-8" id="create_languages_userinfo_form" name="create_languages_userinfo_form" class="form-horizontal">

                                        {{ csrf_field() }}

                                            @include ('admin.languages_userinfos.form', [

                                                'languagesUserinfo' => null,

                                            ])

                                            <div class="d-flex align-items-center justify-content-between">

                                                <p class="lead mb-0"></p>

                                                <button class="btn btn-outline-primary" type="submit" >Valider</button>

                                            </div>

                                        </form>

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
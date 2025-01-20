@extends('layouts.app')
@section('content')
<link href="{{ asset('css/V2/admin.css') }}" rel="stylesheet" />
    <section class="bg-white py-5">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg></div>
                                Informations complémentaires
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
                <div class="default">
                    <div class="card mb-4">
                        <div class="card-header">
                            Vos informations
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="cardTabContent">
                                <div class="tab-pane py-5 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h3 class="text-primary">Vos informatios complémentaires</h3>
                                            <h5 class="card-title mb-4">Laissez vos informations utiles aux près des recruteurs pour faire la différence face aux autres!</h5>
                                            @if (Auth::user()->hasRole('recruteur'))
                                                <form method="POST" action="{{ route('recruteur.create.userinfos') }}" accept-charset="UTF-8" id="" name="create_userinfo_form" class="form-horizontal">
                                                {{ csrf_field() }}
                                                    @include ('admin.userinfos.form', [
                                                                            'userinfo' => null,
                                                                          ])
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="lead mb-0"></p>
                                                        <button class="btn btn-primary" type="submit">Valider!</button>
                                                    </div>
                                                </form>
                                            endif
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
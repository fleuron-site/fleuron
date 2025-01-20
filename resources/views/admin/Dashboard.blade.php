@extends('layouts.app')

@section('content')
    <?php 
        $point = new App\Models\Project;
        $points = $point->pointParUser();
        $somE = 0;
        $somP = 0;
    
    ?>
    <section class="bg-white">
        <header class="page-header page-header-light bg-light pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="fs-4 text-dark fw-500">Auteurs</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fs-4 text-dark fw-500">Nombre de projets publiés</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fs-4 text-dark fw-500">Nombre des offres d'emploi publiées</div>
                        </div>
                    </div>
                    @foreach($points as $point)
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    @if(!empty($point->avatar))
                                        <div class="avatar avatar-lg"><img class="avatar-img img-fluid" src="{{ asset('storage/'. $point->avatar) }}"></div>
                                    @else
                                        <div class="avatar avatar-lg"><img class="avatar-img img-fluid" src="{{ asset('storage/uploads/profil/user.png') }}"></div>
                                    @endif
                                    <div class="ms-3">
                                        <div class="fs-4 text-dark fw-500">{{ $point->last_name }}</div>
                                        <div class="small text-muted">{{ $point->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg"></div>
                                    <div class="ms-3">
                                    <?php $somP += $point->nbP ?>    
                                        <div class="small text-muted">{{ $point->nbP }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg"></div>
                                    <div class="ms-3">
                                    <?php $somE += $point->nbE ?> 
                                        <div class="small text-muted">{{ $point->nbE }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg"></div>
                                <div class="ms-3">
                                    <div class="fs-4 text-dark fw-500">Nombre total de réalisations à ce jour</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg"></div>
                                <div class="ms-3">
                                    <div class="small text-muted">{{ $somP }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg"></div>
                                <div class="ms-3">
                                    <div class="small text-muted">{{ $somE }}</div>
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

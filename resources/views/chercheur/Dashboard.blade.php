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
                                Votre espace de travail

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

                                    <h3>Liste des offres pour lesquelles j'ai postulé</h3>

                                    <div class="table-responsive table-billing-history">

                                        <table class="table mb-0">

                                            <thead>

                                                <tr>

                                                    <th class="border-gray-200" scope="col">Offre</th>
                                                    <th class="border-gray-200" scope="col">Type de l'offre</th>

                                                    <th class="border-gray-200" scope="col">Date de candidature</th>

                                                    <th class="border-gray-200" scope="col">Status</th>
                                                    <th class="border-gray-200" scope="col">Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @if(empty(count($liste_projets)))

                                                    <tr>

                                                        <td colspan="3">Vous n'avez postulé à aucun projet!</span></td>

                                                    </tr>

                                                @else

                                                    @foreach($liste_projets as $projet)

                                                        <tr>

                                                            <td> <a href="{{ route('detail', $projet->project->id) }}">{{ $projet->project->name }}</a></td>
                                                            <td>
                                                                @if($projet->project->categorie == 'EE')
                                                                    Offre d'emploi
                                                                @else
                                                                    Prestation de services
                                                                @endif
                                                            </td>
                                                            <td>{{ $projet->created_at }}</td>

                                                            @if($projet->project->cloturer == 0)

                                                                <td><span class="badge bg-light text-dark">En cours</span></td>

                                                            @else

                                                                <td><span class="badge bg-danger text-white">Cloturée</span></td>

                                                            @endif
                                                            <td>
                                                                @if($projet->project->cloturer == 0)
                                                                    <a href="{{ route('chercheur.candidature.edit', ['candidature' => $projet->id]) }}"><i class='far fa-edit' style='font-size:16px'></i></a>
                                                                @else
                                                                @endif
                                                            </td>

                                                        </tr>

                                                    @endforeach

                                                @endif

                                            </tbody>

                                        </table>

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
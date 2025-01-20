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
                                Offres déjà réalisées

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

                    <div class="default">

                        <div class="card mb-4">

                            <div class="card-body">

                                <table class="table mb-0">

                                    <thead>

                                        <tr>

                                        <th>Offre</th>

                                        <th data-hide="phone" class="text-center">Réalisée par</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    @if(count($realisers) > 0) 

                                        @foreach($realisers as $offre)

                                            <tr>

                                            <td><a href="{{ route('detail', $offre->project->id) }}">{{ $offre->project->name }}</a></td>
                                            <?php
                                                $candidats = App\Models\Realiser::with('candidature')->where('project_id', $offre->project->id)->get();
                                            ?>
                                            
                                            <td class="text-center">
                                                @php
                                                    $userNames = [];
                                                @endphp

                                                @foreach($candidats as $candidat)
                                                    @php
                                                        $userNames[] = $candidat->candidature->user->last_name . ' ' . $candidat->candidature->user->first_name;
                                                    @endphp
                                                @endforeach

                                                <a href="{{ route('recruteur.detail.candidats', $candidat->candidature->user->userinfo->id) }}">
                                                    {{ implode(', ', $userNames) }}
                                                </a>

                                            </td>

                                            </tr>

                                            @endforeach

                                    @else

                                        <tr>

                                            <td colspan="2" class="text-center">Aucune offre réalisée</td>

                                        </tr>

                                    @endif

                                        

                                    </tbody>

                                </table>
                                {!! $realisers->links() !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @include('layouts.V2.banderole')

    </section>

@endsection


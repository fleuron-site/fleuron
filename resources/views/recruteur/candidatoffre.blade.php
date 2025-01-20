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

                            <?php $name = ''; ?>

                            @foreach($candidats as $candidat)

                                <?php $name = $candidat->project->name; ?>

                            @endforeach

                            Candidats postulés à l'offre " <?php echo $name; ?> "

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

            <div class="col-md-8">

                <div class="default">

                    <div class="card mb-4">

                        <div class="card-body">

                            <div class="boxs-body">

                                <div class="table-responsive table-billing-history">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Candidat</th>

                                                <th>Téléphone</th>

                                                <th class="text-center">CV</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                        @if(count($candidats) > 0) 

                                            @foreach($candidats as $candidat)

                                                <?php
                                                    $cvv = new App\Models\Candidature();
                                                    $cv = $cvv->cv($candidat->User->id);
                                                ?>

                                                <tr>

                                                    <td>
                                                        <a href="{{ route('recruteur.detail.candidats', $cv->id) }}">
                                                            {{ $candidat->User->last_name }} {{ $candidat->User->first_name }}
                                                        </a>
                                                    </td>

                                                    <td>{{ $candidat->tel }}</td>

                                                    @if(!empty($candidat->cv))
                                                        <td class="text-center">
                                                            @if(!empty($candidat->cv))
                                                                <a href="{{ asset('storage/' . $candidat->cv) }}" target="_blank">
                                                                    <i class="fa fa-file-pdf"></i>
                                                                </a>
                                                            @elseif($candidat->user->id)
                                                                <a href="{{ asset('storage/' . $cv->cv) }}" target="_blank">
                                                                    <i class="fa fa-file-pdf"></i>
                                                                </a>
                                                            @else
                                                                <span class="text-red">CV non chargé!</span>
                                                            @endif
                                                        </td>

                                                    @else

                                                        <td class="text-center">ras!</td>

                                                    @endif

                                                </tr>

                                            @endforeach

                                        @else

                                            <tr>

                                                <td colspan="6" class="text-center">Aucun(e) candidat(e) n'a postulé!</td>

                                            </tr>

                                        @endif

                                        </tbody>

                                        <tfoot>

                                        <tr>

                                            <td colspan="6" class="text-left"><a onclick ="history.go(-1)"><i class="fa fa-arrow-circle-left"></i></a></td>

                                        </tr>

                                        </tfoot>

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


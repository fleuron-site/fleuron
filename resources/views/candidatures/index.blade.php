@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="bg-white mt-5">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
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
            <div class="default">
                <div class="card card-header-actions mb-4">
                    <div class="card-body px-0">
        
                        @if(count($candidatures) == 0)
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><h4>Pas de candidatures disponibles.</h4></td>
                                    </tr>
                                 <tbody>
                            </table>
                        @else
    
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Nom && prénom(s)</th>
                                        <th>Projet</th>
                                        <th>Prix extimé!</th>
                                        <th>CV</th>
                                        <th style="width: 12%;" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($candidatures as $candidature)
                                    <tr>
                                        <td>{{ $candidature->user->last_name }} {{ $candidature->user->first_name }}</td>
                                        <td><a href="{{ route('detail', $candidature->Project->id) }}">{{ $candidature->Project->name }}</a></td>
                                        <td>
                                            @if(!empty($candidature->prix) && $candidature->Project->categorie === 'P')
                                                {{ $candidature->prix }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            @if($candidature->Project->categorie === 'P' && !empty($candidature->cv))
                                                <a href="{{ asset('storage/'. $candidature->cv) }}" target="_blanc"> 
                                                    <span class="fa fa-file" aria-hidden="true"></span> 
                                                </a>
                                            @elseif($candidature->Project->categorie === 'EE' && !empty($candidature->cv))
                                                <a href="{{ asset('storage/'. $candidature->cv) }}" target="_blanc"> 
                                                    <span class="fa fa-file" aria-hidden="true"></span> 
                                                </a>
                                            @else
                                                <?php $cv = App\Models\Userinfo::where('user_id', $candidature->user_id)->first();?>
                                                @if(!empty($cv->cv))
                                                    <a href="{{ asset('storage/'. $cv->cv) }}" target="_blanc"> 
                                                        <span class="fa fa-file" aria-hidden="true"></span> 
                                                    </a>
                                                @else
                                                    <span>CV non charger</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <form method="POST" action="{!! route('admin.candidatures.candidature.destroy', $candidature->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}
            
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('admin.candidatures.candidature.show', $candidature->id ) }}" class="btn btn-info" title="Show Candidature">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </div>
            
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $candidatures->links() !!}
                        @endif
                    </div>
                </div>
            </div>
         </div>
         @include('layouts.V2.banderole')
     </section>
@endsection
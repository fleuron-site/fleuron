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
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="page-header-title mb-0">
                            <div>
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                Votre espace de travail
                            </div>
                        </h1>
                        <a class="btn btn btn-primary" href="{{ route('admin.projects.project.create') }}">
                            <span class="fa fa-plus" style="color:white" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card card-header-actions mb-4">
                    <div class="card-body px-0">
                        @if(count($projects) == 0)
                            <h4>{{ trans('projects.none_available') }}</h4>
                        @else
                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                <thead>
                                    <tr>
                                        <th>{{ __('Libellé de l\'offre') }}</th>
                                        <th>{{ __('Catégorie') }}</th>
                                        <th>{{ __('Propriétaire') }}</th>
                                        <th>{{ __('Prix minimal') }}</th>
                                        <th>{{ __('prix top') }}</th>
                                        <th>{{ __('Publié!') }}</th>
                                        <th class="text-center">{{ __('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            @if($project->categorie == 'P')
                                                <td>{{ __('Projet') }}</td>
                                            @else
                                                <td>{{ __('Emploi') }}</td>
                                            @endif
                                            
                                            <td>{{ optional($project->User)->last_name }} {{ optional($project->User)->first_name }}</td>
                                            
                                            @if(empty($project->prix))
                                                <td>{{ __('0') }}</td>
                                            @else
                                                <td>{{ $project->prix}}</td>
                                            @endif
                                            
                                            @if(empty($project->prixmax))
                                                <td>{{ __('0') }}</td>
                                            @else
                                                <td>{{ $project->prixmax}}</td>
                                            @endif
                                            <td>
                                                @if ($project->publier == 0)
                                                    <a href="{{route('admin.publier', ['id' => $project->id, 'publier' => 1])}}" class='btn btn-success m-1'>
                                                          <i class='fa fa-check'></i>
                                                      </a>
                                                @else
                                                    <a href="{{route('admin.publier', ['id' => $project->id, 'publier' => 0])}}" class='btn btn-danger m-1'>
                                                          <i class='fa fa-ban'></i>
                                                      </a>
                                                @endif
                                            
                                            </td>
                                            
                                            
                    
                                            <td  class="text-center">
                                                <form method="POST" action="{!! route('admin.projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}
                    
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a href="{{ route('detail', $project->id ) }}" class="btn btn-info m-1" title="{{ trans('projects.show') }}">
                                                            <span class="fa fa-open" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary m-1" title="{{ trans('projects.edit') }}">
                                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                                        </a>
                    
                                                        <button type="submit" class="btn btn-danger m-1" title="{{ trans('projects.delete') }}" onclick="return confirm(&quot;{{ trans('projects.confirm_delete') }}&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                    
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                         
                        <div class="d-flex mt-4">
                            {!! $projects->links() !!}
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
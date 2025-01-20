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
                            <a class="btn btn-primary" href="{{ route('admin.languages.language.create') }}">
                                <span class="fa fa-plus" style="color:white" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card card-header-actions mb-4">
                    <div class="card-body px-0">
                        @if(count($languages) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ trans('languages.none_available') }}</h4>
                            </div>
                        @else
                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                <thead>
                                    <tr>
                                        <th>{{ trans('languages.name') }}</th>
                                        <th>{{ trans('languages.created_at') }}</th>
                                        <th>{{ trans('languages.statut') }}</th>
                
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($languages as $language)
                                        <tr>
                                            <td>{{ $language->name }}</td>
                                            <td>{{ $language->created_at }}</td>
                                            <td>{{ $language->statut }}</td>
                    
                                            <td class="text-center">
                    
                                                <form method="POST" action="{!! route('admin.languages.language.destroy', $language->id) !!}" accept-charset="UTF-8">
                                                    <input name="_method" value="DELETE" type="hidden">
                                                    {{ csrf_field() }}
                    
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a href="{{ route('admin.languages.language.show', $language->id ) }}" class="btn btn-info m-1" title="{{ trans('languages.show') }}">
                                                            <span class="fa fa-open" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="{{ route('admin.languages.language.edit', $language->id ) }}" class="btn btn-primary m-1" title="{{ trans('languages.edit') }}">
                                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                                        </a>
                    
                                                        <button type="submit" class="btn btn-danger m-1" title="{{ trans('languages.delete') }}" onclick="return confirm(&quot;{{ trans('languages.confirm_delete') }}&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                    
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $languages->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
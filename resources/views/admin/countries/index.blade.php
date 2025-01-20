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
        <header class="page-header page-header-light bg-gradient-light pb-10  mt-n5">
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
                        <a class="btn btn btn-primary" href="{{ route('admin.countries.countrie.create') }}">
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
                        @if(count($countries) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ trans('Aucun pays disponible') }}</h4>
                            </div>
                        @else
                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                <thead>
                                    <tr>
                                        <th>{{ trans('countries.namecountry') }}</th>
                                        <th>{{ trans('countries.codetel') }}</th>
                                        <th>{{ trans('countries.created_at') }}</th>
                
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($countries as $country)
                                        <tr>
                                            <td>{{ $country->namecountry }}</td>
                                            <td>{{ $country->codetel }}</td>
                                            <td>{{ $country->created_at }}</td>
                    
                                            <td  class="text-center">
                    
                                                <form method="POST" action="{!! route('admin.countries.countrie.destroy', $country->id) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}
                    
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a href="{{ route('admin.countries.countrie.show', $country->id ) }}" class="btn btn-info m-1" title="{{ trans('countries.show') }}">
                                                            <span class="fa fa-open" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="{{ route('admin.countries.countrie.edit', $country->id ) }}" class="btn btn-primary m-1" title="{{ trans('countries.edit') }}">
                                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                                        </a>
                    
                                                        <button type="submit" class="btn btn-danger m-1" title="{{ trans('countries.delete') }}" onclick="return confirm(&quot;{{ trans('countries.confirm_delete') }}&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                    
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
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

   <section class="bg-white">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            </div>
                            Votre espace de travail
                        </h1>
                        <a class="btn btn btn-primary" href="{{ route('admin.skills.skill.create') }}">
                            <span class="fa fa-plus" style="color:white" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="page-header-subtitle"></div>
                </div>
            </div>
        </header>
        
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card card-header-actions mb-4">
                    <div class="card-body px-0">
        
                        @if(count($skills) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ trans('skills.none_available') }}</h4>
                            </div>
                        @else
                        
                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                <thead>
                                    <tr>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Libellé') }}</th>
                                        <th class="">{{ __('Description') }}</th>
                                        
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($skills as $skill)
                                    <tr style="vertical-align: middle;">
                                        <td><img src="{{ asset('storage/'. $skill->picture) }}" width="30" height="30"></td>
                                        <td>{{ $skill->name }}</td>   
                                        <td class="">{{ $skill->description }}</td>                         
                
                                        <td class="text-center">
                
                                            <form method="POST" action="{!! route('admin.skills.skill.destroy', $skill->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}
                
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('admin.skills.skill.show', $skill->id ) }}" class="btn btn-info m-1" title="{{ trans('skills.show') }}">
                                                        <span class="fa fa-open-o" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ route('admin.skills.skill.edit', $skill->id ) }}" class="btn btn-primary m-1" title="{{ trans('skills.edit') }}">
                                                        <span class="fa fa-pencil" aria-hidden="true"></span>
                                                    </a>
                
                                                    <button type="submit" class="btn btn-danger m-1" title="{{ trans('skills.delete') }}" onclick="return confirm(&quot;{{ trans('skills.confirm_delete') }}&quot;)">
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
                    </div>
                </div>
            </div>
         </div>
         @include('layouts.V2.banderole')
    </section>
@endsection
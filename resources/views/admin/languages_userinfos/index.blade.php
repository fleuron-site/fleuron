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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('languages_userinfos.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('admin.languages_userinfos.languages_userinfo.create') }}" class="btn btn-success" title="{{ trans('languages_userinfos.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($languagesUserinfos) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('languages_userinfos.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <!--<hr style="box-shadow: 0px 0.5px 0px 0px;"> -->
            <div class="form-group" style="width: 30%;">
                <input id="filter" type="text" placeholder="Rechercher:" class="form-control rounded w-md mb-10 inline-block" />
            </div>

            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">>
                <thead>
                    <tr>
                        <th>{{ trans('languages_userinfos.language_id') }}</th>
                        <!--<th>{{ trans('languages_userinfos.userinfo_id') }}</th>-->
                        <th>{{ trans('languages_userinfos.level_oral') }}</th>
                        <th class="text-center">{{ trans('languages_userinfos.level_written') }}</th>

                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($languagesUserinfos as $languagesUserinfo)
                    <tr>
                        <td>{{ optional($languagesUserinfo->Language)->name }}</td>
                        <!--<td>{{ optional($languagesUserinfo->Userinfo)->tel }}</td>-->
                        <td>{{ $languagesUserinfo->level_oral }}</td>
                        <td class="text-center">{{ $languagesUserinfo->level_written }}</td>

                        <td>

                            <form method="POST" action="{!! route('admin.languages_userinfos.languages_userinfo.destroy', $languagesUserinfo->id) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}

                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    <a href="{{ route('admin.languages_userinfos.languages_userinfo.show', $languagesUserinfo->id ) }}" class="btn btn-info" title="{{ trans('languages_userinfos.show') }}">
                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('admin.languages_userinfos.languages_userinfo.edit', $languagesUserinfo->id ) }}" class="btn btn-primary" title="{{ trans('languages_userinfos.edit') }}">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="{{ trans('languages_userinfos.delete') }}" onclick="return confirm(&quot;{{ trans('languages_userinfos.confirm_delete') }}&quot;)">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </div>

                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="hide-if-no-paging">
                    <tr>
                        <td colspan="4" class="text-right">
                            <ul class="pagination">
                            </ul>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="panel-footer">
            {!! $languagesUserinfos->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
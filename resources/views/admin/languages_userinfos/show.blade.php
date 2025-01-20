@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Languages Userinfo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.languages_userinfos.languages_userinfo.destroy', $languagesUserinfo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.languages_userinfos.languages_userinfo.index') }}" class="btn btn-primary" title="{{ trans('languages_userinfos.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.languages_userinfos.languages_userinfo.create') }}" class="btn btn-success" title="{{ trans('languages_userinfos.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.languages_userinfos.languages_userinfo.edit', $languagesUserinfo->id ) }}" class="btn btn-primary" title="{{ trans('languages_userinfos.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('languages_userinfos.delete') }}" onclick="return confirm(&quot;{{ trans('languages_userinfos.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('languages_userinfos.language_id') }}</dt>
            <dd>{{ optional($languagesUserinfo->Language)->name }}</dd>
            <dt>{{ trans('languages_userinfos.userinfo_id') }}</dt>
            <dd>{{ optional($languagesUserinfo->Userinfo)->tel }}</dd>
            <dt>{{ trans('languages_userinfos.level_oral') }}</dt>
            <dd>{{ $languagesUserinfo->level_oral }}</dd>
            <dt>{{ trans('languages_userinfos.level_written') }}</dt>
            <dd>{{ $languagesUserinfo->level_written }}</dd>

        </dl>

    </div>
</div>

@endsection
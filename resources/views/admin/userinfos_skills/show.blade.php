@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Userinfos Skill' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.userinfos_skills.userinfos_skill.destroy', $userinfosSkill->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.userinfos_skills.userinfos_skill.index') }}" class="btn btn-primary" title="{{ trans('userinfos_skills.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.userinfos_skills.userinfos_skill.create') }}" class="btn btn-success" title="{{ trans('userinfos_skills.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.userinfos_skills.userinfos_skill.edit', $userinfosSkill->id ) }}" class="btn btn-primary" title="{{ trans('userinfos_skills.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('userinfos_skills.delete') }}" onclick="return confirm(&quot;{{ trans('userinfos_skills.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('userinfos_skills.userinfo_id') }}</dt>
            <dd>{{ optional($userinfosSkill->Userinfo)->tel }}</dd>
            <dt>{{ trans('userinfos_skills.skill_id') }}</dt>
            <dd>{{ optional($userinfosSkill->Skill)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
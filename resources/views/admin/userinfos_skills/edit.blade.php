@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Userinfos Skill' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('admin.userinfos_skills.userinfos_skill.index') }}" class="btn btn-primary" title="{{ trans('userinfos_skills.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('admin.userinfos_skills.userinfos_skill.create') }}" class="btn btn-success" title="{{ trans('userinfos_skills.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.userinfos_skills.userinfos_skill.update', $userinfosSkill->id) }}" id="edit_userinfos_skill_form" name="edit_userinfos_skill_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.userinfos_skills.form', [
                                        'userinfosSkill' => $userinfosSkill,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('userinfos_skills.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
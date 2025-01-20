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
                <h4 class="mt-5 mb-5">{{ trans('userinfos_skills.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('admin.userinfos_skills.userinfos_skill.create') }}" class="btn btn-success" title="{{ trans('userinfos_skills.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($userinfosSkills) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('userinfos_skills.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <!--<hr style="box-shadow: 0px 0.5px 0px 0px;"> -->
            <div class="form-group" style="width: 30%;">
                <input id="filter" type="text" placeholder="Rechercher:" class="form-control rounded w-md mb-10 inline-block" />
            </div>

            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                <thead>
                    <tr>
                        <!--<th>{{ trans('userinfos_skills.userinfo_id') }}</th>-->
                        <th class="text-center">{{ trans('userinfos_skills.skill_id') }}</th>

                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($userinfosSkills as $userinfosSkill)
                    <tr>
                        <!--<td>{{ optional($userinfosSkill->Userinfo)->tel }}</td>-->
                        <td>{{ optional($userinfosSkill->Skill)->name }}</td>

                        <td>

                            <form method="POST" action="{!! route('admin.userinfos_skills.userinfos_skill.destroy', $userinfosSkill->id) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}

                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    <a href="{{ route('admin.userinfos_skills.userinfos_skill.show', $userinfosSkill->id ) }}" class="btn btn-info" title="{{ trans('userinfos_skills.show') }}">
                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('admin.userinfos_skills.userinfos_skill.edit', $userinfosSkill->id ) }}" class="btn btn-primary" title="{{ trans('userinfos_skills.edit') }}">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="{{ trans('userinfos_skills.delete') }}" onclick="return confirm(&quot;{{ trans('userinfos_skills.confirm_delete') }}&quot;)">
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
            {!! $userinfosSkills->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
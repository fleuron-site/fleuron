@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Candidature' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.candidatures.candidature.destroy', $candidature->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.candidatures.candidature') }}" class="btn btn-primary" title="Show All Candidature">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.candidatures.candidature.create') }}" class="btn btn-success" title="Create New Candidature">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.candidatures.candidature.edit', $candidature->id ) }}" class="btn btn-primary" title="Edit Candidature">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Candidature" onclick="return confirm(&quot;Click Ok to delete Candidature.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt style="padding: 15px">Messagedif</dt>
            <dd style="padding: 15px">{{ $candidature->messagedif }}</dd>
            <dt style="padding: 15px">Duree</dt>
            <dd style="padding: 15px">{{ $candidature->duree }}</dd>
            <dt style="padding: 15px">Prix</dt>
            <dd style="padding: 15px">{{ $candidature->prix }}</dd>
            <dt style="padding: 15px">Cv</dt>
            <?php if($candidature->cv == null){?>
            <dd style="padding: 15px">Null</dd>
            <?php }else{?>
            <dd style="padding: 15px"><a href="https://fleuron.tg/fleuron/storage/app/public/cv/<?php echo $candidature->cv ?>" target="_blanc"> <span class="fa fa-file-archive-o" aria-hidden="true"></span> </a></dd>
            <?php } ?>
            <dt style="padding: 15px">User</dt>
            <dd style="padding: 15px">{{ optional($candidature->User)->last_name }}</dd>
            <dt style="padding: 15px">Project</dt>
            <dd style="padding: 15px">{{ optional($candidature->project)->name }}</dd>
            <dt style="padding: 15px">Created At</dt>
            <dd style="padding: 15px">{{ $candidature->created_at }}</dd>
            <dt style="padding: 15px">Updated At</dt>
            <dd style="padding: 15px">{{ $candidature->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
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
                    </div>
                    <div class="page-header-subtitle"></div>
                </div>
            </div>
        </header>
        
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card card-header-actions p-4">
                    <div class="card-body px-0">
                        <form method="POST" action="{{ route('admin.skills.skill.update', $skill->id) }}" id="edit_skill_form" name="edit_skill_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            @include ('admin.skills.form', [
                                                    'skill' => $skill,
                                                    ])
            
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="lead"></p>
                                <button class="btn btn-outline-primary" type="submit" >
                                    Valider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
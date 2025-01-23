@extends('layouts.app')

@section('content')

    <section class="bg-white mt-5">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </div>
                                Votre espace de travail
                            </h1>
                            <div class="page-header-subtitle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card mb-4">
                    <div class="card-body">
                
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
        
                    <form method="POST" action="{{ route('admin.projects.project.store') }}" accept-charset="UTF-8" id="create_project_form" name="create_project_form" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        @include ('admin.projects.form', [
                                                'project' => null,
                                              ])
                        <div class="d-flex align-items-center justify-content-between p-4">
                            <p class="lead mb-0"></p>
                            <button class="btn btn-outline-primary" type="submit" >
                                Valider!
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



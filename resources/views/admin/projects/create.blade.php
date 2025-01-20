@extends('layouts.app')

@section('content')

    <section class="bg-white py-5">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg></div>
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
                        <div class="card bg-light shadow-none">
                            <div class="card-body d-flex align-items-center justify-content-between p-4">
                                <p class="lead mb-0"></p>
                                <button class="btn btn-primary" type="submit" >
                                    Valider!
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-dark">
            <!-- Rounded SVG Border-->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </section>
@endsection



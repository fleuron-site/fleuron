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
                                    Votre espace d'édition d'images
                                </div>
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
                    <!-- <div class="card-header">
                        Modifier l'image
                    </div> -->
                    <div class="card-body">
                
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.imageurls.imageurl.update', $imageurl->id) }}" id="edit_imageurl_form" name="edit_imageurl_form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            @include ('imageurls.form', [
                                                    'imageurl' => $imageurl,
                                                  ])
            
                            <div class="d-flex align-items-center justify-content-between">
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
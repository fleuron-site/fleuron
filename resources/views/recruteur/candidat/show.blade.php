@extends('layouts.V2.app')

@section('content')

    <section class="bg-white py-5">
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
                                Informations détaillées du candidat
                            </h1>
                            <div class="page-header-subtitle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="row">
                @include('commun.lateral') 

                <div class="col-md-9">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                                type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#cv-tab-pane"
                                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">CV</button>
                        </li>
                        @if (Auth::user()->hasRole('recruteur'))
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-danger" id="fire-tab" data-bs-toggle="tab"
                                    data-bs-target="#fire-tab-pane" type="button" role="tab" aria-controls="fire-tab-pane"
                                    aria-selected="false">Recruitement </button>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                            @include('recruteur.candidat.profile')
                        </div>
                        <div class="tab-pane fade" id="cv-tab-pane" role="tabpanel" aria-labelledby="cv-tab">
                            <style>
                                .pdf-container {
                                    width: 100%;
                                    /* Adjust width as needed */
                                    height: 600px;
                                    /* Adjust height as needed */
                                    border: 1px solid #ddd;
                                    /* Add border */
                                    border-radius: 8px;
                                    /* Add border radius */
                                    overflow: auto;
                                    /* Add scrollbar if content overflows */
                                }
                            </style>
                            <div class="container">
                                @if(!empty($candidature->cv) && Storage::disk('public')->exists($candidature->cv))
                                    <div class="card">
                                        <div class="card-body">
                                            <iframe src="{{ asset('storage/' . $candidature->cv) }}"
                                                class="pdf-container w-100" style="height: 600px;"></iframe>
                                        </div>
                                        @if (Auth::user()->hasRole('chercheur'))
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete CV</button>
                                            </form>
                                        @endif
                                    </div>
                                @elseif ($candidat->cv && Storage::disk('public')->exists($candidat->cv))
                                    <div class="card">
                                        <div class="card-body">
                                            <iframe src="{{ asset('storage/' . $candidat->cv) }}"
                                                class="pdf-container w-100" style="height: 600px;"></iframe>
                                        </div>
                                        @if (Auth::user()->hasRole('chercheur'))
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete CV</button>
                                            </form>
                                        @endif
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">CV Not Available</h5>
                                        </div>
                                        @if (Auth::user()->hasRole('chercheur'))
                                            <div class="card-body">
                                                <p>You can upload a CV using the form below:</p>
                                                <form action="#" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="cvFile" class="form-label">Upload CV:</label>
                                                        <input accept=".pdf" type="file" id="cvFile"
                                                            name="cvFile" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Upload CV</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="fire-tab-pane" role="tabpanel" aria-labelledby="fire-tab">
                            @include('recruteur.candidat.candidatAdmins')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>

@endsection

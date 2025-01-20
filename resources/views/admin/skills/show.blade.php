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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
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
                        <table id="searchTextResults" data-filter="#filter" data-page-size="10" class="footable table table-custom">
                            <tbody>
                                <tr>
                                    <td>{{ trans('skills.name') }}</td>
                                    <td>{{ $skill->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('skills.description') }}</td>
                                    <td><?php echo $skill->description ?></td>
                                </tr>
                                <tr>
                                    <td>{{ trans('skills.picture') }}</td>
                                    <td><img src="{{ asset('storage/' .$skill->picture) }}" width="30" height="30"></td>
                                </tr>
                                <tr>
                                    <td>{{ trans('skills.created_at') }}</td>
                                    <td>{{ $skill->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('skills.updated_at') }}</td>
                                    <td>{{ $skill->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>
@endsection
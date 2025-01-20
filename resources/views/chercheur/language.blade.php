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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                </div>
                                Mes langues

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

                <div class="col-lg-9">

                    <div class="default">

                        <div class="card mb-4">

                            <div class="card-body">

                                <div class="container px-5">

                                    <div class="row gx-5 align-items-center justify-content-center">                                                

                                        <div class="table-responsive table-billing-history">

                                            <table class="table mb-0">

                                                <thead>

                                                    <tr>

                                                        <th style="font-size: 1em;">Langue</th>

                                                        <th style="font-size: 1em;">Nivaeau écrit</th>

                                                        <th style="font-size: 1em;">Nivaeau parlé</th>

                                                        <th class="text-center" style="font-size: 1em;">Actions</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    @if(!empty(count($languagesUserinfos)))

                                                        @foreach($languagesUserinfos as $langue)

                                                        <tr>

                                                            <td>

                                                                {{ $langue->name }}

                                                            </td>

                                                            <td>

                                                                <span>{{ $langue->level_oral}}</span>

                                                            </td>

                                                            <td>

                                                                <span>{{ $langue->level_written }}</span>

                                                            </td>

                                                            <td class="text-center">

                                                                <form method="POST" action="{!! route('chercheur.languages_userinfo.destroy', $langue->id) !!}" accept-charset="UTF-8">

                                                                    <input name="_method" value="DELETE" type="hidden">

                                                                    {{ csrf_field() }}

                                                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                                                        <button type="submit" class="btn btn-danger m-n1" style="padding: 10px;" title="{{ trans('userinfos_skills.delete') }}" onclick="return confirm('Etes-vous sûr de vouloir supprimer?')">

                                                                            <span class="fas fa-trash" aria-hidden="true"></span>

                                                                        </button>

                                                                    </div>

                                                                </form>

                                                            </td>

                                                        </tr>

                                                        @endforeach

                                                    @else   

                                                        <tr>

                                                            <td colspan="4" class="text-center">Aucune donnée disponible!</td>

                                                        </tr>

                                                    @endif

                                                </tbody>

                                                

                                                <tfoot>

                                                    <tr>

                                                        <td colspan="4" class="text-left">

                                                            <div class="d-flex align-items-center justify-content-between">

                                                                <p class="lead mb-0"></p>

                                                                <a class="btn btn-outline-primary" href="{{ route('chercheur.languages_userinfos.languages_userinfo.create') }}">

                                                                    Ajouter

                                                                </a>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                </tfoot>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @include('layouts.V2.banderole')

    </section>

@endsection
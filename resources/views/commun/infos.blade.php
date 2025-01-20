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
                                Informations personnelles

                            </h1>

                            <div class="page-header-subtitle">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                @include('commun.lateral') 

                <div class="col-lg-9">

                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="row justify-content-center">

                                <div class="col-xl-10">

                                    @if (empty(count($Userinfos)))

                                        <form method="POST" action="{{ route('chercheur.create.userinfos') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                            {{ csrf_field() }}

                                            <input name="_method" type="hidden" value="PUT">

                                            @include ('admin.userinfos.form', [

                                                                        'userinfo' => null,

                                                                    ])

                                            <div class="card bg-light shadow-none">

                                                <div class="card-body d-flex align-items-center justify-content-between p-4">

                                                    <p class="lead mb-0"></p>

                                                    <button class="btn btn-primary" type="submit">Valider!</button>

                                                        

                                                </div>

                                            </div>

                                        </form>

                                    @else

                                        <div class="form_userinfo" style="display: none;">

                                            <form method="POST" action="{{ route('update.userinfos', $userinfo->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                {{ csrf_field() }}

                                                <input name="_method" type="hidden" value="PUT">

                                                @include ('admin.userinfos.form', [

                                                                            'userinfo' => $userinfo,

                                                                        ])

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="lead mb-0"></p>
                                                    <button class="btn btn-primary" type="submit">Valider!</button>

                                                </div>

                                            </form>

                                        </div>

                                        <div class="table-responsive userinfo_table" style="display: block;">

                                            <div class="table-responsive table-billing-history">

                                                <table class="table mb-0">
                                                    <tbody>

                                                        <tr>

                                                            <th>Date d'inscription

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->created_at }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                Date de modification

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->updated_at }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                Nom

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->user->last_name }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                Prénom

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->user->first_name }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                Email

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->user->email }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                Téléphone

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->tel }}</a>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th>

                                                                A propos

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->about }}</a>

                                                            </td>

                                                        </tr>
                                                        @if (Auth::user()->hasRole('chercheur'))
                                                            <tr>

                                                                <th>

                                                                    Disponibilité

                                                                </th>

                                                                <td>

                                                                    <a>{{ $userinfo->vacant }}</a>

                                                                </td>

                                                            </tr>
                                                        @endif
                                                        <tr>

                                                            <th>

                                                                Pays

                                                            </th>

                                                            <td>

                                                                <a>{{ $userinfo->country->namecountry }}</a>

                                                            </td>

                                                        </tr>

                                                        
                                                        @if (Auth::user()->hasRole('chercheur'))
                                                            <tr>

                                                                <th>

                                                                    CV

                                                                </th>

                                                                <td>
                                                                    @if(!empty($userinfo->cv))
                                                                        <a href="{{ asset('storage/' . $userinfo->cv) }}" target="_blank">Voir le cv actuel</a>
                                                                    @else
                                                                        <span class="text-red">CV non chargé!</span>
                                                                    @endif

                                                                </td>

                                                            </tr>
                                                        @endif
                                                    </tbody>

                                                    <tfoot class="hide-if-no-paging">

                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="d-flex align-items-center justify-content-between">

                                                                    <p class="lead mb-0"></p>

                                                                    <button class="btn btn-outline-primary edit_userinfo">Modifier mes informations</button>
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </tfoot>

                                                </table>
                                            </div>

                                        </div>

                                    @endif

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
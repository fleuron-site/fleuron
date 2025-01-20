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
                                Chercheurs disponibles

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
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" id="filter-nom" class="form-control" placeholder="Rechercher par nom && prénom(s)">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="filter-tel" class="form-control" placeholder="Rechercher par numéro de téléphone">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="filter-domaine" class="form-control" placeholder="Rechercher par domaine d'intervention">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="searchTextResults" class="table mb-0">

                                    <thead>

                                        <tr>

                                            <th>Nom && prénom(s)</th>

                                            <th>Téléphone</th>

                                            <th>Domaines d'intervention</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @if(count($chercheurs) > 0) 

                                            @foreach($chercheurs as $chercheur)

                                                <?php
                                                    $domaineChercheurs = App\Models\Userinfos_skill::where('userinfo_id', $chercheur->id)->get();
                                                ?>

                                                <tr>

                                                    <td>
                                                        <a href="{{ route('recruteur.detail.candidats', $chercheur->id) }}">
                                                            {{ $chercheur->last_name }} {{ $chercheur->first_name }}
                                                        </a>
                                                    </td>

                                                    <td>{{ $chercheur->tel }}</td>

                                                    <td>
                                                        @php
                                                            $domaines = [];
                                                        @endphp

                                                        @foreach($domaineChercheurs as $domaineChercheur)
                                                            @php
                                                                $domaines[] = $domaineChercheur->skill->name;
                                                            @endphp
                                                        @endforeach

                                                        {{ implode(', ', $domaines) }}
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @else

                                            <tr>

                                                <td colspan="5" class="text-center">Pas de chercheur disponible</td>

                                            </tr>

                                        @endif

                                        <tr id="no-data-row" style="display: none;" class="text-center">
                                            <td colspan="4" class="text-center">Aucun chercheur disponible</td>
                                        </tr>

                                    </tbody>

                                </table>
                                {!! $chercheurs->links() !!}
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterNom = document.getElementById('filter-nom');
            const filterTel = document.getElementById('filter-tel');
            const filterDomaine = document.getElementById('filter-domaine');
            const tableRows = document.querySelectorAll('.table tbody tr');
            const noDataRow = document.getElementById('no-data-row'); // Ligne pour le message "Aucune offre disponible"

            function filterTable() {
                const nomValue = filterNom.value;
                const telValue = filterTel.value;
                const domaineValue = filterDomaine.value;

                let visibleRowCount = 0;

                tableRows.forEach(row => {
                    if (row.cells.length < 2) return;

                    const nom = row.cells[0].textContent;
                    const tel = row.cells[1].textContent.trim();
                    const domaine = row.cells[2].textContent.trim();

                    const matchesNom = nom.includes(nomValue);
                    const matchesTel = tel.includes(telValue);
                    const matchesDomaine = domaine.includes(domaineValue);

                    const isVisible = matchesNom && matchesTel && matchesDomaine;
                    row.style.display = isVisible ? '' : 'none';

                    if (isVisible) visibleRowCount++;
                });

                // Affiche ou masque la ligne "Aucune offre disponible"
                noDataRow.style.display = visibleRowCount === 0 ? '' : 'none';
            }

            filterNom.addEventListener('input', filterTable);
            filterTel.addEventListener('input', filterTable);
            filterDomaine.addEventListener('input', filterTable);
        });
    </script>

@endsection
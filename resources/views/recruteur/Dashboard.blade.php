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
                                Votre espace de travail

                            </h1>

                            <div class="page-header-subtitle"></div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        

        <div class="container-xl px-4 mt-n10" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12">

                    <div class="default">

                        <div class="tab-content" id="cardTabContent">

                            <div class="tab-pane py-5 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">

                                <div class="row justify-content-center">

                                    <div class="col-xl-4 mb-4">

                                        <div class="card border-start-lg border-start-primary h-100">

                                            <div class="card-body">

                                                

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1">

                                                        <div class="small fw-bold text-primary mb-1">Total offres</div>

                                                        <div class="h5">{{ count($projects) }}</div>

                                                        <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up me-1"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>

                                                            <a href="{{ route('home') }}">Vos offres</a>

                                                        </div>

                                                    </div>

                                                    <div class="ms-2"><svg class="svg-inline--fa fa-dollar-sign fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M146 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3C4.9 411.4-2.4 392.5 4.8 376.3s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C105.4 279.3 70.4 270 44.4 253c-14.2-9.3-27.5-22-35.8-39.6C.3 195.4-1.4 175.4 2.5 154.1C9.7 116 38.3 91.2 70.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"></path></svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    
                                    <div class="col-xl-4 mb-4">

                                        <div class="card border-start-lg border-start-success h-100">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1">

                                                        <div class="small fw-bold text-success mb-1">Offres réalisées</div>

                                                        <div class="h5">{{ count($Realiser)}}</div>

                                                        <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up me-1"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>

                                                            <a href="{{ route('recruteur.offreRealiser') }}"> Réalisés </a>

                                                        </div>

                                                    </div>

                                                    <div class="ms-2"><svg class="svg-inline--fa fa-arrow-pointer fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-pointer" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M0 55.2V426c0 12.2 9.9 22 22 22c6.3 0 12.4-2.7 16.6-7.5L121.2 346l58.1 116.3c7.9 15.8 27.1 22.2 42.9 14.3s22.2-27.1 14.3-42.9L179.8 320H297.9c12.2 0 22.1-9.9 22.1-22.1c0-6.3-2.7-12.3-7.4-16.5L38.6 37.9C34.3 34.1 28.9 32 23.2 32C10.4 32 0 42.4 0 55.2z"></path></svg></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xl-4 mb-4">

                                        <div class="card border-start-lg border-start-secondary h-100">

                                            <div class="card-body">

                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1">

                                                        <div class="small fw-bold text-secondary mb-1">Total chercheurs</div>

                                                        <div class="h5">{{ $totalChercheurs }}</div>

                                                        <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down me-1"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>

                                                            <a href="{{ route('recruteur.listeChercheurs') }}">Chercheurs</a>

                                                        </div>

                                                    </div>

                                                    <div class="ms-2"><svg class="svg-inline--fa fa-tag fa-2x text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path></svg><!-- <i class="fas fa-tag fa-2x text-gray-200"></i> Font Awesome fontawesome.com --></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    

        <div class="container-xl px-4">

            <div class="row">

                @include('commun.lateral') 

                <div class="col-lg-9">

                    <div class="default">

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" id="filter-title" class="form-control" placeholder="Rechercher par titre de l'offre">
                                    </div>
                                    <div class="col-md-4">
                                        <select id="filter-status" class="form-control">
                                            <option value="">Par statut "En cours" ou "clôturé"</option>
                                            <option value="cours">En cours</option>
                                            <option value="cloturee">Clôturée</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="tab-content" id="cardTabContent">

                                    <div class="tab-pane py-2 py-xl-12 fade active show" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">

                                        <div class="row justify-content-center">

                                            <div class="col-xl-12">
                                                <div class="table-responsive table-billing-history">
                                                    <table class="table mb-0">

                                                        <thead>

                                                            <tr>

                                                                <th>Titre de l'offre</th>

                                                                <th>Date de lôture</th>

                                                                <th  class="text-center">Candidats</th>
                                                                <th>Status</th>
                                                                <th class="text-center" scope="col">Action</th>

                                                            </tr>

                                                        </thead>

                                                        <tbody>
                                                            @if(!empty($projects))
                                                                @foreach($projects as $project)

                                                                    <?php
                                                                        $nbr = new App\Models\Candidature();
                                                                        $nbrPostulant = $nbr->NbrPostulantParProjet($project->id);
                                                                    ?>
                                                                    <tr>
                                                                        <td> <a href="{{ route('detail', $project->id) }}">{{ $project->name }}</a></td>
                                                                        <td>{{ \Carbon\Carbon::parse($project->datexpir)->format('d/m/Y H:i:s') }}</td>
                                                                        <td class="text-center">
                                                                            @if($nbrPostulant == 0)
                                                                                <span>0</span>
                                                                            @else
                                                                                <a href="{{ route('recruteur.listee', $project->id) }}">
                                                                                    {{ $nbrPostulant }}
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($project->cloturer == 0 && $project->realiser == 0)

                                                                                <span class="badge bg-light text-dark">En cours</span>

                                                                            @else

                                                                                <span class="badge bg-danger text-white">Cloturée</span>

                                                                            @endif
                                                                        </td>

                                                                        <td class="text-center">
                                                                            @if($project->cloturer == 0)
                                                                                <a href="{{ route('projects.project.edit', $project->id ) }}"><i class='far fa-edit' style='font-size:16px'></i></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                            <tr id="no-projects-row">
                                                                <td colspan="3" class="text-center">Vous n'avez publié aucune offre!</td>
                                                            </tr>
                                                            @endif
                                                            
                                                            <tr id="no-data-row" style="display: none;" class="text-center">
                                                                <td colspan="4" class="text-center">Aucune offre disponible</td>
                                                            </tr>
                                                        </tbody>

                                                    </table>

                                                    {!! $projects->links() !!}

                                                </div>

                                            </div>

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

    <script> 
        document.addEventListener('DOMContentLoaded', function () {
            const filterTitle = document.getElementById('filter-title');
            const filterStatus = document.getElementById('filter-status');
            const tableRows = document.querySelectorAll('.table tbody tr');
            const noDataRow = document.getElementById('no-data-row'); // Ligne pour le message "Aucune offre disponible"

            function filterTable() {
                const titleValue = filterTitle.value.toLowerCase();
                const statusValue = filterStatus.value;

                let visibleRowCount = 0;

                // const date = new Date(dateValue);

                // const day = String(date.getDate()).padStart(2, '0'); // Ajoute un zéro si nécessaire
                // const month = String(date.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0
                // const year = date.getFullYear();

                // Reformater la date
                // const formattedDate = `${day}/${month}/${year}`;

                tableRows.forEach(row => {
                    if (row.cells.length < 2) return;

                    const title = row.cells[0].textContent.toLowerCase();
                    const status = row.cells[3].textContent.trim().toLowerCase();

                    const matchesTitle = title.includes(titleValue);
                    const matchesStatus = statusValue ? status.includes(statusValue) : true;

                    const isVisible = matchesTitle && matchesStatus;
                    row.style.display = isVisible ? '' : 'none';

                    if (isVisible) visibleRowCount++;
                });

                // Affiche ou masque la ligne "Aucune offre disponible"
                noDataRow.style.display = visibleRowCount === 0 ? '' : 'none';
            }

            filterTitle.addEventListener('input', filterTable);
            filterStatus.addEventListener('change', filterTable);
        });
    </script>



@endsection


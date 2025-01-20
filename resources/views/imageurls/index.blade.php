@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    

    <section class="bg-white mt-5">
        <header class="page-header page-header-light bg-light pb-10  mt-n5">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="page-header-title mb-0">
                                <div>
                                    <div class="page-header-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                        </svg>
                                    </div>
                                    Votre espace d'images de profil
                                </div>
                            </h1>
                            <a class="btn btn-primary" href="{{ route('admin.imageurls.imageurl.create') }}">
                                <span class="fa fa-plus" style="color:white" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="page-header-subtitle">Images servant le partage des offres ou projets sur les réseaux sociaux</div>
                        
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container-xl px-4 mt-n10" data-aos="fade-up">
            <div class="default">
                <div class="card card-header-actions mb-4">
                    <div class="card-header">
                        <input type="text" id="filter-title" class="form-control" placeholder="Rechercher par decription de l'image">
                    </div>
                    <div class="card-body px-0">
                        @if(count($imageurls) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ __('Aucun enregistrement trouvé!')}}</h4>
                            </div>
                        @else

                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                <thead>
                                    <tr>
                                        <th>{{ __('Images') }}</th>
                                        <th>{{ trans('Description de l\'image') }}</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($imageurls as $imageurl)
                                        <tr style="vertical-align: middle;">
                                            <td><img class="img-fluid mx-auto" src="{{ asset('uploads/photoreseaux/'. $imageurl->img ) }}" alt="" width="100"></td>
                                            <td>{{ $imageurl->descrip }}</td>
                    
                                            <td class="text-center">
                                                
                                                <form method="POST" action="{!! route('admin.imageurls.imageurl.destroy', $imageurl->id) !!}" accept-charset="UTF-8">
                                                    <input name="_method" value="DELETE" type="hidden">
                                                    {{ csrf_field() }}
                        
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a href="{{ route('admin.imageurls.imageurl.edit', $imageurl->id ) }}" class="btn btn-primary m-1" title="{{ trans('imageurl.edit') }}">
                                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                                        </a>
                    
                                                        <button type="submit" class="btn btn-danger m-1" title="{{ trans('imageurl.delete') }}" onclick="return confirm(&quot;{{ trans('imageurl.confirm_delete') }}&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                    
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="no-data-row" style="display: none;" class="text-center">
                                        <td colspan="4" class="text-center">Image non disponible</td>
                                    </tr>
                                </tbody>
                            </table>
                            {!! $imageurls->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.V2.banderole')
    </section>

    
    <script> 
        document.addEventListener('DOMContentLoaded', function () {
            const filterTitle = document.getElementById('filter-title');
            const tableRows = document.querySelectorAll('.table tbody tr');
            const noDataRow = document.getElementById('no-data-row'); // Ligne pour le message "Aucune offre disponible"

            function filterTable() {
                const titleValue = filterTitle.value.toLowerCase();

                let visibleRowCount = 0;

                tableRows.forEach(row => {
                    if (row.cells.length < 1) return;

                    const title = row.cells[1].textContent.toLowerCase();

                    const matchesTitle = title.includes(titleValue);

                    const isVisible = matchesTitle;
                    row.style.display = isVisible ? '' : 'none';

                    if (isVisible) visibleRowCount++;
                });

                // Affiche ou masque la ligne "Aucune offre disponible"
                noDataRow.style.display = visibleRowCount === 0 ? '' : 'none';
            }

            filterTitle.addEventListener('input', filterTable);
        });
    </script>
@endsection
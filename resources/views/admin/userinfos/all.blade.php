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
                                Informations complémentaires
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
                @if(Auth::user()->hasRole('chercheur'))
                    @include('commun.lateral') 
                @else
                    @include('commun.lateral')
                @endif
                <div class="col-lg-9">
                    <div class="default">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    @if (Auth::user()->hasRole('chercheur'))
                                        <form method="POST" action="{{ route('chercheur.userinfos.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            @include ('admin.userinfos.infos', [
                                                                'userinfo' => null,
                                                                ])
                                        </form>
                                    @elseif (Auth::user()->hasRole('recruteur'))
                                        <form method="POST" action="{{ route('recruteur.create.userinfos') }}" accept-charset="UTF-8">
                                        {{ csrf_field() }}
                                            @include ('admin.userinfos.form', [
                                                                    'userinfo' => null,
                                                                    ])
                                            <div class="d-flex align-items-center justify-content-between p-4">
                                                <p class="lead mb-0"></p>
                                                <button class="btn btn-primary" type="submit">Valider!</button>
                                            </div>
                                        </form>
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

    <script>
        let currentStep = 1;
        showStep(currentStep);

        function ajouterChamp() {
            // Compter le nombre de champs existants
            const nombreChamps = document.querySelectorAll('.champs').length;
            // Ajouter un champ uniquement si le total est inférieur à 10
            if (nombreChamps < 10) {
                let champIndex = nombreChamps + 1;
                const nouveauChamp = `
                    <div class="champs">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select class="form-control" name="language_id[]" required>
                                    <option value="" disabled selected>{{ __('Selctionnez la langue ici') }}</option>
                                    @foreach ($Languages as $Language)
                                        <option value="{{ $Language->id }}">{{ $Language->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="level_oral_${champIndex}" class="control-label mb-2">{{ __('Niveau oral') }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_oral_${champIndex}" type="radio" value="Beginner" required>
                                    <label class="form-check-label">{{ __('Débutant (e)') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_oral_${champIndex}" type="radio" value="Average" required>
                                    <label class="form-check-label">{{ __('Moyen (ne)') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_oral_${champIndex}" type="radio" value="Excellent" required>
                                    <label class="form-check-label">{{ __('Excellent (e)') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level_written_${champIndex}" class="control-label mb-2">{{ __('Niveau écrit') }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_written_${champIndex}" type="radio" value="Beginner" required>
                                    <label class="form-check-label">{{ __('Débutant (e)') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_written_${champIndex}" type="radio" value="Average" required>
                                    <label class="form-check-label">{{ __('Moyen (ne)') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level_written_${champIndex}" type="radio" value="Excellent" required>
                                    <label class="form-check-label">{{ __('Exellent (e)') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-danger px-2 py-2" onclick="supprimerChamp(this)">Supprimer</button>
                        </div>
                    </div>`;

                // Ajouter le champ dans le conteneur
                document.getElementById('container').insertAdjacentHTML('beforeend', nouveauChamp);

                // Désactiver le bouton si le nombre de champs atteint 10
                if (nombreChamps + 1 >= 10) {
                    document.getElementById('btn-ajouter-champ').disabled = true;
                }
            }
        }

        function supprimerChamp(element) {
            // Trouver et supprimer le parent contenant le champ
            const champ = element.closest('.champs');
            if (champ) {
                champ.remove();

                // Vérifier le nombre de champs restants
                const nombreChampsRestants = document.querySelectorAll('.champs').length;

                // Réactiver le bouton si le nombre de champs est inférieur à 10
                if (nombreChampsRestants < 10) {
                    document.getElementById('btn-ajouter-champ').disabled = false;
                }
            } else {
                console.error("L'élément à supprimer est introuvable.");
            }
        }



        function showStep(step) {
            let steps = document.getElementsByClassName("step");
            for (let i = 0; i < steps.length; i++) {
            steps[i].style.display = "none";
            }
            steps[step - 1].style.display = "block";
        }

        function nextStep(step) {
            if (validateStep(step)) {
                if (step < document.getElementsByClassName("step").length) {
                showStep(step + 1);
                currentStep = step + 1;
                }
            }
        }

        function prevStep(step) {
            if (step > 1) {
            showStep(step - 1);
            currentStep = step - 1;
            }
        }

        function validateStep(step) {
            // Exemple : vérifier si tous les champs requis sont remplis
            const currentFields = document.querySelector(`#step${step}`).querySelectorAll('[required]');
            if (step == 2) {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][data-group="skills"]');
                const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                if (!isChecked) {
                    alert("Veuillez sélectionner au moins un domaine d'intervention.");
                    e.preventDefault(); // Empêche la soumission
                }
                
            }

            for (const field of currentFields) {
                if (!field.value) {
                    alert('Veuillez remplir tous les champs requis.');
                    return false;
                }
            }
            return true;
        }

        const monSelect = document.querySelector('#pays');
        const monInput = document.querySelector('#cod');
        monSelect.addEventListener('change', function() {
            const optionSelectionnee = monSelect.options[monSelect.selectedIndex];
            const dataId = optionSelectionnee.getAttribute('data-id');
            monInput.value = dataId;
        });
    </script>
@endsection
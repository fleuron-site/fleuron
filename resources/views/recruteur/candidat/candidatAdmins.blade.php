<div class="container-sm mt-5">
    <div class="alert alert-danger" role="alert">
        <strong>Avertissement:</strong> La selection d'un prestataire pour cette offre est irréversible. Une fois terminée, cette action ne peut pas être annulée. Êtes-vous absolument sûr de vouloir continuer&nbsp;?
    </div>
    <hr>
    <div class="container-sm mt-5 confirmation-text">

        <div class="privacy-policy">
            <h2 class="privacy-policy__title">Accord de recruitement</h2>
            <div class="privacy-policy__content">
                <p class="privacy-policy__intro">Bienvenue chez <span class="privacy-policy__company-name">SOCIETE</span>! Nous sommes ravis de vous compter parmi notre équipe. Avant de procéder, veuillez consulter les modalités du processus de recruitement.</p>

                <div class="privacy-policy__section">
                    <h3 class="privacy-policy__section-title">1. Informations personnelles</h3>
                    <p class="privacy-policy__section-desc">Dans le cadre du recruitement, nous recueillons certaines informations personnelles vous concernant. Cela comprend:</p>
                    <ul class="privacy-policy__list">
                        <li class="privacy-policy__item">Votre nom complet: <span class="privacy-policy__item-value"> <strong>{{ $candidat->user->last_name }}
                        {{ $candidat->user->first_name }}</strong></span></li>
                        <li class="privacy-policy__item">Coordonnées: <span class="privacy-policy__item-value">{{ $candidat->user->email }},
                                , </span>
                        </li>
                        <li class="privacy-policy__item">Documents d'identification: <span class="privacy-policy__item-value"></span></li>

                        <!-- Add or remove items as needed -->
                    </ul>
                </div>

                <div class="privacy-policy__section">
                    <h3 class="privacy-policy__section-title">2. Utilisation des informations</h3>
                    <p class="privacy-policy__section-desc">Nous utilisons les informations collectées pour:</p>
                    <ul class="privacy-policy__list">
                        <li class="privacy-policy__item">Traitement de votre recruitement</li>
                        <li class="privacy-policy__item">Conformité aux exigences légales et réglementaires</li>
                        <li class="privacy-policy__item">Tenue de dossiers internes et fins administratives
                        </li>
                        <!-- Add or remove items as needed -->
                    </ul>
                </div>

                <!-- Add more sections as needed -->

                <p class="privacy-policy__footer">En procédant au recruitement, vous reconnaissez avoir lu et accepté les conditions décrites ci-dessus.</p>
            </div>
        </div>
    </div>

    <div class="container-sm mt-3">
        <button class="btn btn-outline-dark" onclick="printConfirmationText()">Imprimer le texte de confirmation</button>
    </div>

    <hr>

    <form action="{{ route('recruteur.recruitement') }}" method="post" accept-charset="UTF-8">
    {{ csrf_field() }}
        <input type="hidden" name="candidature_id" value="{{ $candidature->id }}">               
        <input type="hidden" name="project_id" value="{{ $candidature->project->id }}">   
        <?php
            $candidat = DB::table('realisers')->where('$candidature_id', $candidature->id)
        ?>  
        @if(empty($candidat))          
            <input type="submit" class="btn btn-outline-success btn-lg float-end">Continuer</button>
        @endif
    </form>
</div>
<h2 class="mb-2" style="text-decoration: underline;">
    Informations personnelles
</h2>

<div class="row mb-5">
    <div class="col-md-6 {{ $errors->has('cv') ? 'has-error' : '' }}">
        <label class="text-dark mb-2" for="cv">Mon CV</label>
        <input class="form-control py-4" name="cv" type="file" style="border: 2px dashed #26aae1;">
        {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 {{ $errors->has('photo') ? 'has-error' : '' }}">
        <label class="text-dark mb-2" for="photo">Photo passport</label>
        <input class="form-control py-4" name="photo" type="file" style="border: 2px dashed #26aae1;">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<h2 class="mb-2" style="text-decoration: underline;">
    Informations complémentaires 
</h2>

@if($project['categorie'] == 'P')
    <div class="row mb-4 rounded">
        <!-- Section pour le prix -->
        <div class="col-md-6 d-flex align-items-end mb-3 mb-md-0">
            <div class="flex-grow-1 me-3 {{ $errors->has('prix') ? 'has-error' : '' }}">
                <label class="text-dark fw-bold mb-2" for="prix">
                    {{ __('Quel montant proposez-vous ?') }}
                </label>
                <div class="input-group">
                    <input 
                        class="form-control border-primary" 
                        name="prix" 
                        type="number" 
                        min="0" 
                        id="prix" 
                        placeholder="{{ __('Ex : 20000') }}" 
                        required>
                    <span class="input-group-text bg-primary text-white">{{ __('Francs CFA') }}</span>
                </div>
                {!! $errors->first('prix', '<p class="text-danger mt-1 small">:message</p>') !!}
            </div>
        </div>
        <!-- Section pour la durée -->
        <div class="col-md-6 d-flex align-items-end">
            <div class="flex-grow-1 me-3 {{ $errors->has('duree') ? 'has-error' : '' }}">
                <label class="text-dark fw-bold mb-2" for="duree">
                    {{ __('Vous pouvez réaliser le projet en') }}
                </label>
                <div class="input-group">
                    <input 
                        class="form-control border-primary" 
                        name="duree" 
                        type="number" 
                        min="0" 
                        id="duree"
                        placeholder="{{ __('Nombre de jours ...') }}" 
                        required>
                    <span class="input-group-text bg-primary text-white">{{ __('Jour(s)') }}</span>
                </div>
                {!! $errors->first('duree', '<p class="text-danger mt-1 small">:message</p>') !!}
            </div>
        </div>
    </div>
@endif

<div id="details-offre" class="mt-2">
    <h6>Message d'accompagnement</h6>
    <span>
        Démarquez-vous ! Vous avez le choix de conserver un message d'accompagnement ci-dessous ou d’en rédiger un nouvel ...
    </span>

    <div class="row mt-2 {{ $errors->has('duree') ? 'has-error' : '' }}">
        <div class="col-md-12">
            <select class="form-control" id="mySelect" onchange="loadTextarea()">
                <option value="option1">Message type</option>
                <option value="">Nouvel message</option>
            </select>
        </div>
    </div>
    <div class="row mt-4 {{ $errors->has('duree') ? 'has-error' : '' }}">
        <div class="col-md-12">
            <textarea class="form-control py-4" rows="10" name="messagedif" id="myTextarea" required>
                Bonjour,

                Je me permets de vous solliciter pour le poste de ........ pour lequel je souhaite vous proposer ma candidature.

                Veuillez trouver en pièce jointe mon Curriculum Vitae.

                Je me tiens à votre disposition pour toutes questions relatives à mon profil.

                Bien cordialement.
            </textarea>
        </div>
    </div>
    
    <div class="">
        <div class="d-flex align-items-center justify-content-between p-4">
            <p class="lead mb-0"></p>
            
            <button type="submit" class="btn btn-outline-primary">Valider</button>
                
        </div>
    </div>

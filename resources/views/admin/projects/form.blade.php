<div class="row mb-3 {{ $errors->has('categorie') ? 'has-error' : '' }}">
    <div class="col-md-6">
        <h3>Categorie de l'offre</h3>
        <div class="radio">
            <label for="categorie_EE">
                <input id="categorie_EE" class="" name="categorie" type="radio" value="EE" required="true" {{ old('categorie', optional($project)->categorie) == 'EE' ? 'checked' : '' }}>
                Offre d'emplois pour mon entreprise
            </label>
        </div>
        <div class="radio">
            <label for="categorie_P">
                <input id="categorie_P" class="" name="categorie" type="radio" value="P" required {{ old('categorie', optional($project)->categorie) == 'P' ? 'checked' : '' }}>
                Prestation de services
            </label>
        </div>
        <div class="radio">
            <label for="categorie_E">
                <input id="categorie_E" class="" name="categorie" type="radio" value="E" required="true" {{ old('categorie', optional($project)->categorie) == 'E' ? 'checked' : '' }}>
                Offre d'emplois
            </label>
        </div>
        {!! $errors->first('categorie', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <h3>Date d'expiration</h3>
        <input type="datetime-local" name="datexpir" class="form-control" value="{{ old('datexpir', optional($project)->datexpir) }}">
        {!! $errors->first('datexpir', '<span class="help-block">:datexpir</span>') !!}
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <h3> Pays </h3>
        <select class="form-control" name="country_id" required>
        <option value="" disabled {{ old('country_id', optional($project)->country_id) ? '' : 'selected' }}>
            {{ __('Pays') }}
        </option>
        @foreach ($Countries as $Country)
            <option value="{{ $Country->id }}" 
                {{ old('country_id', optional($project)->country_id) == $Country->id ? 'selected' : '' }}>
                {{ $Country->namecountry }}
            </option>
        @endforeach
    </select>

    </div>
    <div class="col-md-6">
        <h3> Titre de l'offre </h3>
        <input class="form-control" name="name" type="text" value="{{ old('name', optional($project)->name) }}" id="name" placeholder="{{ __('Titre de l\'offre') }}" required>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div id="montants" style="display: none;">
    <div  class="row mb-3">
        <div class="col-md-6 d-flex align-items-end mb-3 mb-md-0">
            <div class="flex-grow-1 me-3 {{ $errors->has('prix') ? 'has-error' : '' }}">
                <h3>
                    Prix minimal de l'offre
                </h3>
                <div class="input-group">
                    <input 
                        class="form-control border-primary" 
                        name="prix" 
                        type="number" 
                        min="0" 
                        id="prix" 
                        value="{{ old('prix', optional($project)->prix) }}"
                        placeholder="{{ __('Ex : 20000') }}">
                    <span class="input-group-text bg-primary text-white">{{ __('Francs CFA') }}</span>
                </div>
                {!! $errors->first('prix', '<p class="text-danger mt-1 small">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-end mb-3 mb-md-0">
            <div class="flex-grow-1 me-3 {{ $errors->has('prix') ? 'has-error' : '' }}">
                <h3>
                    Prix maximal de l'offre
                </h3>
                <div class="input-group">
                    <input 
                        class="form-control border-primary" 
                        name="prixmax" 
                        type="number" 
                        min="0" 
                        id="prixmax" 
                        value="{{ old('prixmax', optional($project)->prixmax) }}"
                        placeholder="{{ __('Ex : 20000') }}">
                    <span class="input-group-text bg-primary text-white">{{ __('Francs CFA') }}</span>
                </div>
                {!! $errors->first('prixmax', '<p class="text-danger mt-1 small">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-xl-6">
        <h3> Domaine de l'offre</h3>
        <select class="form-control" name="skill_id" required>
        <option value="" disabled {{ old('skill_id', optional($project)->skill_id) ? '' : 'selected' }}>
            {{ __('Selectionnez un domaine') }}
        </option>
        @foreach ($skills as $skill)
            <option value="{{ $skill->id }}" 
                {{ old('skill_id', optional($project)->skill_id) == $skill->id ? 'selected' : '' }}>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>

    </div>
    <div class="col-xl-6">
        <h3>Image du profile de l'offre</h3>
        <select class="form-control" name="imageurl_id" required>
        <option value="" disabled {{ old('imageurl_id', optional($project)->imageurl_id) ? '' : 'selected' }}>
            Sélectionnez le profil pour l'offre
        </option>
        @foreach ($imageurls as $imageurl)
            <option value="{{ $imageurl->id }}" 
                {{ old('imageurl_id', optional($project)->imageurl_id) == $imageurl->id ? 'selected' : '' }}>
                {{ $imageurl->descrip }}
            </option>
        @endforeach
    </select>

    </div>
</div>

<div class="row mb-3 {{ $errors->has('description') ? 'has-error' : '' }}">
    <div class="col-md-12">
        <h3> Description de l'offre </h3>
        <textarea class="ckeditor form-control text-center" name="description" id="ckeditor" required>{{ old('description', optional($project)->description) }}</textarea>
        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
    </div>
</div>
<!-- if (Auth::user()->hasRole('admin')) -->
<!-- endif -->
 
<div class="row">
    <div class="col-md-12 {{ $errors->has('file') ? 'has-error' : '' }}">
        <h3>Fichier de description de l'offre</h3>
        <input class="form-control py-4" name="file" type="file" style="border: 2px dashed #26aae1;">
        <span id="fileHelp">Doc, docx, pdf (3Mo max)</span>
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
    @if (old('file', optional($project)->file))
        <div>
            <a href="{{ asset('storage/' . old('file', optional($project)->file)) }}" target="_blank">Voir le fichiet actuelle</a>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionnez les options radio
        const radioCategorieP = document.getElementById('categorie_P');
        const radioOthers = document.querySelectorAll('input[name="categorie"]:not(#categorie_P)');
        const montantsBlock = document.getElementById('montants');

        // Ajoutez un événement sur l'option "categorie_P"
        radioCategorieP.addEventListener('change', function () {
            if (this.checked) {
                montantsBlock.style.display = 'block';
            }
        });

        // Cachez le bloc si d'autres options sont sélectionnées
        radioOthers.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    montantsBlock.style.display = 'none';
                }
            });
        });
    });
</script>

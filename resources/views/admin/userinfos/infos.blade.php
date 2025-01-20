
   <div class="step" id="step1">
        <h3>Information personnelles</h3>
        <hr>
        <div class="mb-3 {{ $errors->has('countrie_id') ? 'has-error' : '' }}">
            <label class="small mb-1" for="inputUsername">Pays de résidence</label>
            <select class="form-control" id="pays" name="countrie_id" required="true">
                <option value="" disabled selected>{{ __('Pays de résidence') }}</option>
                @foreach ($Countries as  $Country)
                    <option value="{{ $Country->id }}" data-id="{{ $Country->codetel }}">{{ $Country->namecountry }}</option>
                @endforeach
            </select>
        </div>

        <div class="row gx-3 {{ $errors->has('countrie_id') ? 'has-error' : '' }}">
            <div class="mb-3 col-md-2">
                <label class="small mb-1" for="inputFirstName">Indicatif du pays</label>
                <input class="form-control" placeholder="Indicatif" id="cod" readonly="readonly" name="cod" value="" onchange="updateInput(i)">
            </div>
            <div class="mb-3 col-md-10">
                <label class="small mb-1" for="inputLastName">Numéro de téléphone</label>
                <input class="form-control" name="tel" type="text" id="tel" value="" minlength="8" maxlength="45" placeholder="{{ __('Numéro de téléphone') }}" required>
            </div>
        </div>

        @if (Auth::user()->hasRole('chercheur'))
            <div class="row gx-3 {{ $errors->has('vacant') ? 'has-error' : '' }} mt-2">
                <label class="mb-3 col-md-3">{{ __('Votre disponibilité :') }}</label>
                <div class="col-md-3">
                    <div class="radio">
                        <label for="vacant_oui">
                            <input id="vacant_oui" name="vacant" type="radio" value="Oui" required="true">
                            {{ __('Disponible') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label for="vacant_non">
                            <input id="vacant_non" name="vacant" type="radio" value="Non" required="true">
                            {{ __('Indisponible') }}
                        </label>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <label for="cv" class="form-label">CV (PDF)</label>
                    <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv"
                        name="cv" accept=".pdf">
                    @error('cv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (old('cv', optional($userinfo)->cv))
                        <div>
                            <a href="{{ asset('storage/' . optional($userinfo)->cv) }}" target="_blank">Voir le cv actuel</a>
                        </div>
                    @endif
                </div>
           </div>
        @endif

        <div class="row gx-3">
            <div class="mb-3 col-md-12">
                <label class="small mb-1" for="inputOrgName">Votre message personnel</label>
                <textarea class="form-control" name="about" cols="200" rows="5" id="about" placeholder="{{ __('Entrez votre biographie') }}" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:right;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                    </div>
                    <button class="btn btn-outline-primary" onclick="nextStep(1)">Suivant</button>
                </div>
            </div>
        </div>
    </div>


    <div class="step" id="step2">
        <h3>Vos domaines d'intervention</h3>
        <hr>
        <div class="default">
            <div class="row">
                @foreach ($Skills as $key => $Skill)
                    @if($key % 5 == 0) 
                        <div class="col-md-4">
                    @endif

                    <label for="skill_id-{{ $key }}">
                        <input type="checkbox" id="skill_id-{{ $key }}" name="skill_id[]" value="{{ $key }}" data-group="skills">
                        {{ $Skill }}
                    </label>
                    <br/>

                    @if(($key + 1) % 5 == 0 || $loop->last)
                        </div>
                    @endif
                @endforeach

        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
            </div>
            <div>
                <button class="btn btn-outline-cyan" type="button" onclick="prevStep(2)" style="margin: 0.5em;">Précédent</button>
                <button class="btn btn-outline-primary" onclick="nextStep(2)">Suivant</button>
            </div>                
        </div>
    </div>
    <div class="step" id="step3">
        <h3>Vos langues</h3>
        <hr>   
        <div class="row mb-3">
            <div class="col-md-12">
                <select class="form-control" name="language_id[]" required>
                    <option value="" disabled selected>{{ __('Selctionnez la langue ici') }}</option>
                    @foreach ($Languages as $Language)
                        <option value="{{ $Language->id }}">
                            {{ $Language->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3 {{ $errors->has('level_oral') ? 'has-error' : '' }}">
            <div class="col-md-6">
                <label for="level_oral" class="control-label mb-2" style="text-align: left;">{{ __('Niveau oral') }}</label>
                <div class="form-check">
                    <input class="form-check-input" name="level_oral_0" type="radio" value="Beginner" required>
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Débutant (e)') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="level_oral_0" type="radio" value="Average" required="true">
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Moyen (ne)') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="level_oral_0" type="radio" value="Excellent" required="true">
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Excellent (e)') }}</label>
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="level_written" class="control-label mb-2">{{ __('Niveau écrit') }}</label>
                <div class="form-check">
                    <input class="form-check-input" name="level_written_0" type="radio" value="Beginner" required="true">
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Débutant (e)') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="level_written_0" type="radio" value="Average" required="true">
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Moyen (ne)') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="level_written_0" type="radio" value="Excellent" required="true">
                    <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Exellent (e)') }}</label>
                </div>
            </div>
        </div>  

        <div id="container">
        </div>

        <a class="btn btn-outline-success px-2 py-2" id="btn-ajouter-champ" onclick="ajouterChamp()">Ajouter</a>
        
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
            </div>
            <div>
                <button class="btn btn-outline-cyan" type="button" onclick="prevStep(3)" style="margin: 0.5em;">Précédent</button>
                <button class="btn btn-outline-primary" type="submit" style="margin: 0.5em;">Valider</button>
            </div>                
        </div>
    </div>

<div class="mb-3 {{ $errors->has('countrie_id') ? 'has-error' : '' }}">
    <label class="small mb-1" for="inputUsername">Pays de résidence</label>
    <select class="form-control" id="pays" name="countrie_id" required="true">
        <option value="{{ old('countrie_id', optional($userinfo)->countrie_id ?: '') == '' ? 'selected' : '' }}" disabled selected>{{ __('Pays de résidence') }}</option>
        @foreach ($Countries as  $Country)
            <option value="{{ $Country->id }}" data-id="{{ $Country->codetel }}" {{ old('countrie_id', optional($userinfo)->countrie_id) == $Country->id ? 'selected' : '' }}>{{ $Country->namecountry }}</option>
        @endforeach
    </select>
    {!! $errors->first('countrie_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="row gx-3 {{ $errors->has('countrie_id') ? 'has-error' : '' }}">
    <div class="mb-3 col-md-2">
        <label class="small mb-1" for="inputFirstName">Indicatif du pays</label>
        <input class="form-control" placeholder="Indicatif" id="cod" readonly="readonly" name="cod" value="{{ old('tel', substr(optional($userinfo)->tel,0,6)) }}" onchange="updateInput(i)">
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="mb-3 col-md-10">
        <label class="small mb-1" for="inputLastName">Numéro de téléphone</label>
        <input class="form-control" name="tel" type="text" id="tel" value="{{ old('tel', substr(optional($userinfo)->tel,6,12)) }}" minlength="8" maxlength="45" placeholder="{{ __('Numéro de téléphone') }}" required>
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@if (Auth::user()->hasRole('chercheur'))
    <div class="row gx-3 {{ $errors->has('vacant') ? 'has-error' : '' }} mt-2">
        <label class="mb-3 col-md-3">
        {{ __('Votre disponibilité :') }}
        </label>
        <div class="col-md-3">
            <div class="radio">
                <label for="vacant_oui">
                    <input id="vacant_oui" name="vacant" type="radio" value="Oui" required="true" {{ old('vacant', optional($userinfo)->vacant) == 'Oui' ? 'checked' : '' }} >
                    {{ __('Disponible') }}
                </label>
            </div>
            <div class="radio">
                <label for="vacant_non">
                    <input id="vacant_non" name="vacant" type="radio" value="Non" required="true" {{ old('vacant', optional($userinfo)->vacant) == 'Non' ? 'checked' : '' }}>
                    {{ __('Indisponible') }}
                </label>
            </div>
            {!! $errors->first('vacant', '<p class="help-block">:message</p>') !!}
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
        <textarea class="form-control" name="about" cols="200" rows="5" id="about" placeholder="{{ __('Entrez votre biographie') }}" required>{{ old('about', optional($userinfo)->about) }}</textarea>
        {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
    </div>
</div>


        
        
<script>
    const monSelect = document.querySelector('#pays');
    const monInput = document.querySelector('#cod');
    monSelect.addEventListener('change', function() {
        console.log("salut");
        const optionSelectionnee = monSelect.options[monSelect.selectedIndex];
        const dataId = optionSelectionnee.getAttribute('data-id');
        monInput.value = dataId;
    });
</script>




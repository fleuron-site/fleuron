

<strong>Langue</strong>
<hr>
<div class="row mb-3 {{ $errors->has('language_id') ? 'has-error' : '' }}">
    <div class="col-md-12">
        <select class="form-control" id="language_id" name="language_id" required>
        	    <option value="" disabled selected>{{ __('Selctionnez la langue ici') }}</option>
        	@foreach ($Languages as $key => $Language)
			    <option value="{{ $key }}">
                    {{ $Language }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row mb-3 {{ $errors->has('level_oral') ? 'has-error' : '' }}">
    <div class="col-md-6">
        <label for="level_oral" class="control-label mb-2" style="text-align: left;">{{ __('Niveau oral') }}</label>
        <div class="form-check">
        	<input id="level_oral_beginner" class="form-check-input" name="level_oral" type="radio" value="Beginner" required {{ old('level_oral', optional($languagesUserinfo)->level_oral) == 'Beginner' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Débutant (e)') }}</label>
        </div>
        <div class="form-check">
        	<input id="level_oral_average" class="form-check-input" name="level_oral" type="radio" value="Average" required="true" {{ old('level_oral', optional($languagesUserinfo)->level_oral) == 'Average' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Moyen (ne)') }}</label>
        </div>
        <div class="form-check">
        	<input id="level_oral_excellent" class="form-check-input" name="level_oral" type="radio" value="Excellent" required="true" {{ old('level_oral', optional($languagesUserinfo)->level_oral) == 'Excellent' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Excellent (e)') }}</label>
        </div>
        {!! $errors->first('level_oral', '<p class="help-block">:message</p>') !!}
    </div>
    
    <div class="col-md-6">
        <label for="level_written" class="control-label mb-2">{{ __('Niveau écrit') }}</label>
        <div class="form-check">
            <input id="level_written_beginner" class="form-check-input" name="level_written" type="radio" value="Beginner" required="true" {{ old('level_written', optional($languagesUserinfo)->level_written) == 'Beginner' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Débutant (e)') }}</label>
        </div>
        <div class="form-check">
            <input id="level_written_average" class="form-check-input" name="level_written" type="radio" value="Average" required="true" {{ old('level_written', optional($languagesUserinfo)->level_written) == 'Average' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Moyen (ne)') }}</label>
        </div>
        <div class="form-check">
            <input id="level_written_excellent" class="form-check-input" name="level_written" type="radio" value="Excellent" required="true" {{ old('level_written', optional($languagesUserinfo)->level_written) == 'Excellent' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckSolidDefault">{{ __('Exellent (e)') }}</label>
        </div>

        {!! $errors->first('level_written', '<p class="help-block">:message</p>') !!}
    </div>

</div>



<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="col-md-12 mb-4">
        <label for="name" class="control-label">{{ trans('languages.name') }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($language)->name) }}" minlength="1" maxlength="45" placeholder="{{ trans('languages.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('statut') ? 'has-error' : '' }}">
    <div class="col-md-12 mb-4">
        <label for="statut" class="control-label">{{ trans('languages.statut') }}</label>
        <select class="form-control" id="statut" name="statut">
        	    <option value="" style="display: none;" {{ old('statut', optional($language)->statut ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('languages.statut__placeholder') }}</option>
        	@foreach (['activated' => trans('languages.statut_activated'), 'desactivated' => trans('languages.statut_desactivated')] as $key => $text)
			    <option value="{{ $key }}" {{ old('statut', optional($language)->statut) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('statut', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('namecountry') ? 'has-error' : '' }}">
    <div class="col-md-12 mb-4">
        <label for="namecountry" class="control-label">{{ trans('countries.namecountry') }}</label>
        <input class="form-control" name="namecountry" type="text" id="namecountry" value="{{ old('namecountry', optional($country)->namecountry) }}" minlength="2" maxlength="100" placeholder="{{ trans('countries.namecountry__placeholder') }}" required>
        {!! $errors->first('namecountry', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codetel') ? 'has-error' : '' }}">
    <div class="col-md-12 mb-4">
        <label for="codetel" class="col-md-2 control-label">{{ trans('countries.codetel') }}</label>
        <input class="form-control" name="codetel" type="text" id="codetel" value="{{ old('codetel', optional($country)->codetel) }}" minlength="2" maxlength="30" placeholder="{{ trans('countries.codetel__placeholder') }}" required>
        {!! $errors->first('codetel', '<p class="help-block">:message</p>') !!}
    </div>
</div>


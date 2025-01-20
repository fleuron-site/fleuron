
<div class="row mb-4">
    <div class="col-xl-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">{{ __('Libellé de compétance') }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($skill)->name) }}" minlength="1" maxlength="150" required="true" placeholder="{{ __('Libellé') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-xl-6 {{ $errors->has('picture') ? 'has-error' : '' }}">
        <label for="picture" class="col-md-2 control-label">{{ __('Image') }}</label>
        <div class="input-group uploaded-file-group">
            <input type="file" class="form-control uploaded-file-name" name="picture" id="picture">
        </div>
        @if (isset($skill->picture) && !empty($skill->picture))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_picture" class="custom-delete-file" value="1" {{ old('custom_delete_picture', '0') == '1' ? 'checked' : '' }}>
                </span>
                <span class="input-group-addon custom-delete-file-name">
                    {{ $skill->picture }}
                </span>
            </div>
        @endif
        {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row mb-4">
    <div class="col-xl-12 {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="control-label">{{ __('Description') }}</label>
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($skill)->description) }}" placeholder="{{ __('Description') }}">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


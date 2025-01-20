<div class="row mb-4">
    <div class="col-md-6 {{ $errors->has('last_name') ? 'has-error' : '' }}">
        <label for="last_name" class="control-label text-left">{{ trans('users.last_name') }}</label>
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 {{ $errors->has('first_name') ? 'has-error' : '' }}">
        <label for="first_name" class="control-label text-left">{{ trans('users.first_name') }}</label>
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($user)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="control-label text-left">{{ trans('users.email') }}</label>
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($user)->email) }}" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row mb-4 {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label class="control-label">Role utilisateur</label>
    <div class="col-md-12">
            <select name="role_id" class="form-control" data-parsley-trigger="change" required>
            <option value="" disabled {{ old('role_id', optional($user)->role_id) ? '' : 'selected' }}>
                {{ __('Inscrivez-vous en tant que ...') }}
            </option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" 
                    {{ old('role_id', optional($user)->role_id) == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


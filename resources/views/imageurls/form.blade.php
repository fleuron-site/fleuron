
<div class="row">
    <div class="col-xl-6  {{ $errors->has('img') ? 'has-error' : '' }}">
        <label for="img" class="control-label">Image à charger</label>
        <input class="form-control" type="file" name="img" id="img" required="true" placeholder="Enter img here...">
        {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
        
        @if (old('img', optional($imageurl)->img))
            <div>
                <a href="{{ asset('uploads/photoreseaux/' . optional($imageurl)->img) }}" target="_blank">Voir l'image actuelle</a>
            </div>
        @endif
    </div>
    <div class="col-xl-6 {{ $errors->has('descrip') ? 'has-error' : '' }}">
        <label for="descrip" class="control-label">Description</label>
        <input class="form-control" name="descrip" type="text" id="descrip" value="{{ old('descrip', optional($imageurl)->descrip) }}" maxlength="150" placeholder="Entrer la description ici...">
        {!! $errors->first('descrip', '<p class="help-block">:message</p>') !!}
    </div>
</div>


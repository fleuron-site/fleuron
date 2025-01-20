<strong>Domaine</strong>
<hr>
<div class="row">
    @foreach ($Skills as $key => $Skill)
        @if($key % 5 == 0) 
            <div class="col-md-4"> <!-- Divise les éléments en colonnes -->
        @endif

        <label for="skill_id-{{ $key }}">
            <input type="checkbox" id="skill_id-{{ $key }}" name="skill_id[]" value="{{ $key }}">
            {{ $Skill }}
        </label>
        <br/>

        @if(($key + 1) % 5 == 0 || $loop->last)
            </div>
        @endif
    @endforeach
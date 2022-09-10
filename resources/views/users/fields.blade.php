<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 191]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mot de passe') !!}
    {!! Form::password('password', ['class' => 'form-control', 'maxlength' => 191, 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-6">
    <label for="">Roles</label>
    <select name="roles[]" id="" class="form-control select2" multiple>
        @foreach ($roles as $_role)
            <option value="{{ $_role->id }}"
                {{ old('roles') && old('roles') == $_role->id ? 'selected' : (isset($user) && $user->hasRole($_role) ? 'selected' : '') }}>
                {{ $_role->name }}</option>
        @endforeach
    </select>
</div>

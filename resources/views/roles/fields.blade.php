<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 125]) !!}
</div>

<div class="form-group col-sm-12">
    <label for="">Permissions</label>
    <select name="permissions[]" id="" class="form-control select2" multiple>
        @foreach ($permissions as $perm)
            <option value="{{ $perm->id }}"
                {{ old('permissions') && old('permissions') == $perm->id ? 'selected' : (isset($role) && $role->hasPermissionTo($perm) ? 'selected' : '') }}>
                {{ $perm->name }}</option>
        @endforeach
    </select>
</div>

<!-- Guard Name Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control','maxlength' => 125]) !!}
</div> --}}

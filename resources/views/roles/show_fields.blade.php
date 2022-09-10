<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="col-sm-12">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $role->guard_name }}</p>
</div>

<!-- Guard Name Field -->
<div class="col-sm-12">
    {!! Form::label('permissions', 'Permissions') !!}
    <div>
        @forelse ($role->permissions as $_perm)
            <span class="badge badge-primary">{{ $_perm->name }}</span>
        @empty
            <span class="badge badge-default">Aucune permission</span>
        @endforelse

    </div>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Guard Name Field -->
<div class="col-sm-12">
    {!! Form::label('roles', 'Roles') !!}
    <div>
        @forelse ($user->roles as $_role)
            <span class="badge badge-primary">{{ $_role->name }}</span>
        @empty
            <span class="badge badge-light">Aucun rôle affecté à cet utilisateur</span>
        @endforelse

    </div>
</div>

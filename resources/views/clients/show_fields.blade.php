<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $client->nom }}</p>
</div>

<!-- Telephone Field -->
<div class="col-sm-12">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $client->telephone }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $client->email }}</p>
</div>

<!-- Entreprise Field -->
<div class="col-sm-12">
    {!! Form::label('entreprise', 'Entreprise:') !!}
    <p>{{ $client->entreprise }}</p>
</div>

<!-- DEBUT -->
<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ optional($client->creepar)->name }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ optional($client->modifiePar)->name }}</p>
</div>
<!-- FIN -->

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $client->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $client->updated_at }}</p>
</div>


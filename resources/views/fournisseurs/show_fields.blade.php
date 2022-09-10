<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $fournisseur->nom }}</p>
</div>

<!-- Telephone Field -->
<div class="col-sm-12">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $fournisseur->telephone }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $fournisseur->email }}</p>
</div>

<!-- Entreprise Field -->
<div class="col-sm-12">
    {!! Form::label('entreprise', 'Entreprise:') !!}
    <p>{{ $fournisseur->entreprise }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ optional($fournisseur->creepar)->name }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ optional($fournisseur->modifiePar)->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fournisseur->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fournisseur->updated_at }}</p>
</div>


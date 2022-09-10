<!-- Fournisseur Id Field -->
<div class="col-sm-12">
    {!! Form::label('fournisseur_id', 'Fournisseur Id:') !!}
    <p>{{ $entreeStock->fournisseur_id }}</p>
</div>

<!-- Produit Id Field -->
<div class="col-sm-12">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    <p>{{ $entreeStock->produit_id }}</p>
</div>

<!-- Numero Lot Field -->
<div class="col-sm-12">
    {!! Form::label('numero_lot', 'Numero Lot:') !!}
    <p>{{ $entreeStock->numero_lot }}</p>
</div>

<!-- Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('quantite', 'Quantite:') !!}
    <p>{{ $entreeStock->quantite }}</p>
</div>

<!-- Prix Unitaire Field -->
<div class="col-sm-12">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    <p>{{ $entreeStock->prix_unitaire }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ optional($entreeStock->creepar)->name }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ optional($entreeStock->modifiePar)->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $entreeStock->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $entreeStock->updated_at }}</p>
</div>

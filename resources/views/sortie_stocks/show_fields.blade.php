<!-- Bon Livraison Id Field -->
<div class="col-sm-12">
    {!! Form::label('bon_livraison_id', 'Bon Livraison Id:') !!}
    <p>{{ $sortieStock->bon_livraison_id }}</p>
</div>

<!-- Produit Id Field -->
<div class="col-sm-12">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    <p>{{ $sortieStock->produit_id }}</p>
</div>

<!-- Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('quantite', 'Quantite:') !!}
    <p>{{ $sortieStock->quantite }}</p>
</div>

<!-- Prix Unitaire Field -->
<div class="col-sm-12">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    <p>{{ $sortieStock->prix_unitaire }}</p>
</div>

<!-- Quantite Livree Field -->
<div class="col-sm-12">
    {!! Form::label('quantite_livree', 'Quantite Livree:') !!}
    <p>{{ $sortieStock->quantite_livree }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ $sortieStock->cree_par }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ $sortieStock->modifie_par }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $sortieStock->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $sortieStock->updated_at }}</p>
</div>


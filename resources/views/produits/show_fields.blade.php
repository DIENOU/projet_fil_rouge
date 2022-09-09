<!-- Code Produit Field -->
<div class="col-sm-12">
    {!! Form::label('code_produit', 'Code Produit:') !!}
    <p>{{ $produit->code_produit }}</p>
</div>

<!-- Designation Field -->
<div class="col-sm-12">
    {!! Form::label('designation', 'Designation:') !!}
    <p>{{ $produit->designation }}</p>
</div>

<!-- Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('quantite', 'Quantite:') !!}
    <p>{{ $produit->quantite }}</p>
</div>

<!-- Prix Unitaire Field -->
<div class="col-sm-12">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    <p>{{ $produit->prix_unitaire }}</p>
</div>

<!-- Quantite Livraison Field -->
<div class="col-sm-12">
    {!! Form::label('quantite_livraison', 'Quantite Livraison:') !!}
    <p>{{ $produit->quantite_livraison }}</p>
</div>

<!-- Unite Id Field -->
<div class="col-sm-12">
    {!! Form::label('unite_id', 'Unite Id:') !!}
    <p>{{ $produit->unite_id }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ optional($produit->creepar)->name }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ optional($produit->modifie_par)->name  }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $produit->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $produit->updated_at }}</p>
</div>


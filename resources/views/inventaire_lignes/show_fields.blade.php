<!-- Produit Id Field -->
<div class="col-sm-12">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    <p>{{ $inventaireLigne->produit_id }}</p>
</div>

<!-- Inventaire Id Field -->
<div class="col-sm-12">
    {!! Form::label('inventaire_id', 'Inventaire Id:') !!}
    <p>{{ $inventaireLigne->inventaire_id }}</p>
</div>

<!-- Quantite Restant Field -->
<div class="col-sm-12">
    {!! Form::label('quantite_restant', 'Quantite Restant:') !!}
    <p>{{ $inventaireLigne->quantite_restant }}</p>
</div>

<!-- Quantite Inventaire Field -->
<div class="col-sm-12">
    {!! Form::label('quantite_inventaire', 'Quantite Inventaire:') !!}
    <p>{{ $inventaireLigne->quantite_inventaire }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ $inventaireLigne->cree_par }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ $inventaireLigne->modifie_par }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $inventaireLigne->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $inventaireLigne->updated_at }}</p>
</div>


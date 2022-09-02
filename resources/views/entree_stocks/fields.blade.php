<!-- Fournisseur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fournisseur_id', 'Fournisseur Id:') !!}
    {!! Form::select('fournisseur_id', ], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Produit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    {!! Form::select('produit_id', ], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Numero Lot Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_lot', 'Numero Lot:') !!}
    {!! Form::text('numero_lot', null, ['class' => 'form-control','maxlength' => 200]) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', 'Quantite:') !!}
    {!! Form::number('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Unitaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    {!! Form::number('prix_unitaire', null, ['class' => 'form-control']) !!}
</div>
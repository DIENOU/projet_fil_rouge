<!-- Bon Livraison Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bon_livraison_id', 'Bon Livraison Id:') !!}
    {!! Form::select('bon_livraison_id', ], null, ['class' => 'form-control custom-select']) !!}
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

<!-- Quantite Livree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_livree', 'Quantite Livree:') !!}
    {!! Form::number('quantite_livree', null, ['class' => 'form-control']) !!}
</div>
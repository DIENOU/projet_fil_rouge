<!-- Inventaire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inventaire_id', 'Inventaire Id:') !!}
    {!! Form::select('inventaire_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Quantite Restant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_restant', 'Quantite Restant:') !!}
    {!! Form::number('quantite_restant', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Inventaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_inventaire', 'Quantite Inventaire:') !!}
    {!! Form::number('quantite_inventaire', null, ['class' => 'form-control']) !!}
</div>
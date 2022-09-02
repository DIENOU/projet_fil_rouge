<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 200]) !!}
</div>

<!-- Unite De Base Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_de_base_quantite', 'Unite De Base Quantite:') !!}
    {!! Form::text('unite_de_base_quantite', null, ['class' => 'form-control']) !!}
</div>
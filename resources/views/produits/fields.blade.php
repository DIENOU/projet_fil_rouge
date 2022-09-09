<!-- Code Produit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_produit', 'Code Produit:') !!}
    {!! Form::text('code_produit', null, ['class' => 'form-control','maxlength' => 50]) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', null, ['class' => 'form-control','maxlength' => 200]) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', 'Quantite:') !!}
    {!! Form::number('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Unitaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    {!! Form::text('prix_unitaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Livraison Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_livraison', 'Quantite Livraison:') !!}
    {!! Form::number('quantite_livraison', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_id', 'Unite Id:') !!}
    {!! Form::select('unite_id', $unites, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $unite->nom }}</p>
</div>

<!-- Unite De Base Id Field -->
<div class="col-sm-12">
    {!! Form::label('unite_de_base_id', 'Unite De Base Id:') !!}
    <p>{{ $unite->unite_de_base_id }}</p>
</div>

<!-- Unite De Base Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('unite_de_base_quantite', 'Unite De Base Quantite:') !!}
    <p>{{ $unite->unite_de_base_quantite }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ $unite->cree_par }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{ $unite->modifie_par }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $unite->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $unite->updated_at }}</p>
</div>


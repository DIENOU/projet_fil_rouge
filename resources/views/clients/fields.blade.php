<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 100]) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 20]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100]) !!}
</div>

<!-- Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entreprise', 'Entreprise:') !!}
    {!! Form::text('entreprise', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<!-- Cree Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    {!! Form::text('cree_par', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifie Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    {!! Form::text('modifie_par', null, ['class' => 'form-control']) !!}
</div>
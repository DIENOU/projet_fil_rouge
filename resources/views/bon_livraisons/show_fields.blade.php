<!-- Numero Bon Livraison Field -->
<div class="col-sm-12">
    {!! Form::label('numero_bon_livraison', 'Numero Bon Livraison:') !!}
    <p>{{ $bonLivraison->numero_bon_livraison }}</p>
</div>

<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $bonLivraison->client_id }}</p>
</div>

<!-- Etat Field -->
<div class="col-sm-12">
    {!! Form::label('etat', 'Etat:') !!}
    <p>{{ $bonLivraison->etat }}</p>
</div>

<!-- Projet Field -->
<div class="col-sm-12">
    {!! Form::label('projet', 'Projet:') !!}
    <p>{{ $bonLivraison->projet }}</p>
</div>

<!-- Cree Par Field -->
<div class="col-sm-12">
    {!! Form::label('cree_par', 'Cree Par:') !!}
    <p>{{ optional($bonLivraison->creepar)->name }}</p>
</div>

<!-- Modifie Par Field -->
<div class="col-sm-12">
    {!! Form::label('modifie_par', 'Modifie Par:') !!}
    <p>{{  optional($bonLivraison->modifiepar)->name}}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bonLivraison->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bonLivraison->updated_at }}</p>
</div>


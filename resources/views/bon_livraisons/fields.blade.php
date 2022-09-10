<!-- Numero Bon Livraison Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_bon_livraison', 'Numero Bon Livraison:') !!}
    {!! Form::text('numero_bon_livraison', null, ['class' => 'form-control', 'maxlength' => 25]) !!}
</div>

<div class="form-group col-sm-6">
    <label for="">client id</label>

    <select name="client_id" id="" class="form-control">
        @foreach (App\Models\Client::all() as $client)
            <option value="{{ $client->id }}">{{ $client->nom }}</option>
        @endforeach
    </select>
</div>

<!-- Projet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projet', 'Projet:') !!}
    {!! Form::text('projet', null, ['class' => 'form-control', 'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    <label for="">Etat</label>

    <select name="etat" id="etat" class="form-control">
        <option value="en_attente"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'en_attente' ? 'selected' : '' }}>En attente
        </option>
        <option value="encours"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'encours' ? 'selected' : '' }}>
            Encours</option>
        <option value="livre"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'livre' ? 'selected' : '' }}>
            Livré</option>
        <option value="pause"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'pause' ? 'selected' : '' }}>
            Pause</option>
        <option value="valide"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'valide' ? 'selected' : '' }}>
            Validé</option>
        <option value="annule"
            {{ isset($bonLivraison) && optional($bonLivraison)->etat == 'annule' ? 'selected' : '' }}>
            Annulé</option>
    </select>
</div>

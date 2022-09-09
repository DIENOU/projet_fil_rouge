
<!-- Numero Bon Livraison Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_bon_livraison', 'Numero Bon Livraison:') !!}
    {!! Form::text('numero_bon_livraison', null, ['class' => 'form-control','maxlength' => 25]) !!}
</div>

<!-- Etat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat', 'Etat:') !!}
    {!! Form::text('etat', null, ['class' => 'form-control','maxlength' => 25]) !!}
</div>

<!-- Projet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projet', 'Projet:') !!}
    {!! Form::text('projet', null, ['class' => 'form-control','maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
<label for="">client id</label>

    <select name="client_id" id="" class="form-control">
        @foreach(App\Models\Client::all() as $client)
        <option value="{{$client->id}}">{{$client->nom}}</option>
        @endforeach
    </select>
</div>
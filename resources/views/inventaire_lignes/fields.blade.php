<!-- Inventaire Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('inventaire_id', 'Inventaire Id:') !!}
    {!! Form::select('inventaire_id', [], null, ['class' => 'form-control custom-select']) !!}
</div> --}}


<div class="form-group col-sm-6">
    <label for="">Inventaire</label>
    <select name="inventaire_id" id="" class="form-control">
        @foreach ($inventaires as $inv)
            <option value="{{ $inv->id }}">{{ $inv->intitule }}</option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-6">
    <label for="">Produit</label>
    <select name="produit_id" id="" class="form-control">
        @foreach ($produits as $prod)
            <option value="{{ $prod->id }}">{{ $prod->code_produit }} - {{ $prod->designation }}
                ({{ number_format($prod->quantite, 2, ',', ' ') }})
            </option>
        @endforeach
    </select>
</div>


<!-- Quantite Restant Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('quantite_restant', 'Quantite Restant:') !!}
    {!! Form::number('quantite_restant', null, ['class' => 'form-control']) !!}
</div> --}}


<!-- Quantite Inventaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_inventaire', 'Quantite Inventaire:') !!}
    {!! Form::number('quantite_inventaire', null, ['class' => 'form-control']) !!}
</div>

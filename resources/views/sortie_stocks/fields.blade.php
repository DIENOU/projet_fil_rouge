<div class="form-group col-sm-6">
    <label for="">Nom produit</label>
    <select name="produit_id" id="" class="form-control">
        @foreach ($produits as $prod)
            <option value="{{ $prod->id }}">{{ $prod->code_produit }} - {{ $prod->designation }}
                ({{ number_format($prod->quantite, 2, ',', ' ') }})
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="">Bon Livraison Id</label>
    <select name="bon_livraison_id" id="" class="form-control">
        @foreach ($bonLivraisons as $liv)
            <option value="{{ $liv->id }}">{{ $liv->numero_bon_livraison }}</option>
        @endforeach
    </select>
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', 'Quantite:') !!}
    {!! Form::number('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Unitaire Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('prix_unitaire', 'Prix Unitaire:') !!}
    {!! Form::number('prix_unitaire', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Quantite Livree Field -->

{{-- NEXT VERSION --}}
{{-- @isset($sortieStock)
    <div class="form-group col-sm-6">
        {!! Form::label('quantite_livree', 'Quantite Livree:') !!}
        {!! Form::number('quantite_livree', null, ['class' => 'form-control']) !!}
    </div>
@endisset --}}

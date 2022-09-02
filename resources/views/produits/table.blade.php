<div class="table-responsive">
    <table class="table" id="produits-table">
        <thead>
        <tr>
            <th>Code Produit</th>
        <th>Designation</th>
        <th>Quantite</th>
        <th>Prix Unitaire</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->code_produit }}</td>
            <td>{{ $produit->designation }}</td>
            <td>{{ $produit->quantite }}</td>
            <td>{{ $produit->prix_unitaire }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['produits.destroy', $produit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('produits.show', [$produit->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('produits.edit', [$produit->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

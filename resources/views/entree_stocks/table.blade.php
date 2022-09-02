<div class="table-responsive">
    <table class="table" id="entreeStocks-table">
        <thead>
        <tr>
            <th>Fournisseur Id</th>
        <th>Produit Id</th>
        <th>Quantite</th>
        <th>Prix Unitaire</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entreeStocks as $entreeStock)
            <tr>
                <td>{{ $entreeStock->fournisseur_id }}</td>
            <td>{{ $entreeStock->produit_id }}</td>
            <td>{{ $entreeStock->quantite }}</td>
            <td>{{ $entreeStock->prix_unitaire }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['entreeStocks.destroy', $entreeStock->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('entreeStocks.show', [$entreeStock->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('entreeStocks.edit', [$entreeStock->id]) }}"
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

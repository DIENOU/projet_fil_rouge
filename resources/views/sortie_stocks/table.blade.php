<div class="table-responsive">
    <table class="table" id="sortieStocks-table">
        <thead>
        <tr>
            <th>Bon Livraison Id</th>
        <th>Quantite</th>
        <th>Prix Unitaire</th>
        <th>Quantite Livree</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sortieStocks as $sortieStock)
            <tr>
                <td>{{ $sortieStock->bon_livraison_id }}</td>
            <td>{{ $sortieStock->quantite }}</td>
            <td>{{ $sortieStock->prix_unitaire }}</td>
            <td>{{ $sortieStock->quantite_livree }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sortieStocks.destroy', $sortieStock->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sortieStocks.show', [$sortieStock->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sortieStocks.edit', [$sortieStock->id]) }}"
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

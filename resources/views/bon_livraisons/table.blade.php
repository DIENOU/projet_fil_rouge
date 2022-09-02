<div class="table-responsive">
    <table class="table" id="bonLivraisons-table">
        <thead>
        <tr>
            <th>Numero Bon Livraison</th>
        <th>Etat</th>
        <th>Projet</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bonLivraisons as $bonLivraison)
            <tr>
                <td>{{ $bonLivraison->numero_bon_livraison }}</td>
            <td>{{ $bonLivraison->etat }}</td>
            <td>{{ $bonLivraison->projet }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bonLivraisons.destroy', $bonLivraison->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bonLivraisons.show', [$bonLivraison->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bonLivraisons.edit', [$bonLivraison->id]) }}"
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

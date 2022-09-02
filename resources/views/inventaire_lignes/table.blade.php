<div class="table-responsive">
    <table class="table" id="inventaireLignes-table">
        <thead>
        <tr>
            <th>Inventaire Id</th>
        <th>Quantite Restant</th>
        <th>Quantite Inventaire</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventaireLignes as $inventaireLigne)
            <tr>
                <td>{{ $inventaireLigne->inventaire_id }}</td>
            <td>{{ $inventaireLigne->quantite_restant }}</td>
            <td>{{ $inventaireLigne->quantite_inventaire }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['inventaireLignes.destroy', $inventaireLigne->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('inventaireLignes.show', [$inventaireLigne->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inventaireLignes.edit', [$inventaireLigne->id]) }}"
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

<div class="table-responsive">
    <table class="table" id="unites-table">
        <thead>
        <tr>
            <th>Nom</th>
        <th>Unite De Base Quantite</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unites as $unite)
            <tr>
                <td>{{ $unite->nom }}</td>
            <td>{{ $unite->unite_de_base_quantite }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['unites.destroy', $unite->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('unites.show', [$unite->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('unites.edit', [$unite->id]) }}"
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

<div class="table-responsive">
    <table class="table" id="inventaires-table">
        <thead>
        <tr>
            <th>Intitule</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventaires as $inventaire)
            <tr>
                <td>{{ $inventaire->intitule }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['inventaires.destroy', $inventaire->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('inventaires.show', [$inventaire->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inventaires.edit', [$inventaire->id]) }}"
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

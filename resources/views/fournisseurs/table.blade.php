<div class="table-responsive">
    <table class="table" id="fournisseurs-table">
        <thead>
        <tr>
            <th>Nom</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Entreprise</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fournisseurs as $fournisseur)
            <tr>
                <td>{{ $fournisseur->nom }}</td>
            <td>{{ $fournisseur->telephone }}</td>
            <td>{{ $fournisseur->email }}</td>
            <td>{{ $fournisseur->entreprise }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['fournisseurs.destroy', $fournisseur->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fournisseurs.show', [$fournisseur->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fournisseurs.edit', [$fournisseur->id]) }}"
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

{!! Form::open(['route' => ['produits.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    @can('afficher produits')
        <a href="{{ route('produits.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-eye"></i>
        </a>
    @endcan

    @can('modifier produits')
        <a href="{{ route('produits.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-edit"></i>
        </a>
    @endcan

    @can('supprimer produits')
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')",
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}

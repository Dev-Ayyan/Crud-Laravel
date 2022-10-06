{!! Form::open(['route' => ['admin.languages.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.languages.show', $id) }}" class='btn btn-success btn-xs'>
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('admin.languages.edit', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fas fa-edit"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash-alt"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}

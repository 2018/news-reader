<div class="btn-group" role="group" aria-label="Buttons">
@if(array_has($item, 'show_button'))
    <div><a type="button" title="{{ _i('Show detail') }}" class="btn btn-info" href="{{ array_get($item, 'show_button') }}"><i class="fas fa-eye"></i></a></div>
@endif
@if(array_has($item, 'edit_button'))
    <div><a type="button" title="{{ _i('Edit record') }}" class="btn btn-warning" href="{{ array_get($item, 'edit_button') }}"><i class="fas fa-pencil-alt"></i></a></div>
@endif
@if(array_has($item, 'delete_button'))
    {{ Form::open(['url' => array_get($item, 'delete_button.0'), 'method' => 'delete']) }}
        <button title="{{ _i('Delete record') }}" class="btn btn-danger" {{ array_get($item, 'delete_button.1') }} type="submit" onclick="return confirm('{{ _i('Are you sure?') }}')"><i class="fas fa-times"></i></button>
    {{ Form::close() }}
@endif
</div>

<div class="checkbox">
    <label class="checkbox-inline">
        {{ Form::hidden($name, 0) }}
        {{ Form::checkbox($name) }}&nbsp;<strong>{{ $label }}</strong>
    </label>
</div>
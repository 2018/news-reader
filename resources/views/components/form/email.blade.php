<div class="form-group">
    {{ Form::label($name, $label) }}
    {{ Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
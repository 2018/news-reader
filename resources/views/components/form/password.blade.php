<div class="form-group">
    {{ Form::label($name, $label) }}<br>
    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
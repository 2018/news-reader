<div class="form-group">
    {{ Form::label($name, $label) }}
    {{ Form::select($name, $list, $selected, array_merge(['class' => 'form-control'], (is_array($selected) ? array_merge(['multiple', 'placeholder' => _i('Select none')], $selectAttributes) : $selectAttributes)), $optionsAttributes) }}
</div>
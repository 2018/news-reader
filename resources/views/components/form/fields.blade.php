@foreach($rows as $name => $prop)
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @php($inputParams = current($prop))
            @php($label = array_get($inputParams, '0'))
            @php($tagParams = array_has($inputParams, '1') ? array_get($inputParams, '1') : [])
        @switch(key($prop))
            @case('text')
                {{ Form::bsText($name, $label, null, $tagParams) }}
            @break
            @case('textarea')
                {{ Form::bsTextarea($name, $label, null, $tagParams) }}
            @break
                @case('date')
                {{ Form::bsDate($name, $label, null, $tagParams) }}
                @break
            @case('email')
                {{ Form::bsEmail($name, $label, null, $tagParams) }}
            @break
            @case('password')
                {{ Form::bsPassword($name, $label, $tagParams) }}
            @break
            @case('checkbox')
                {{ Form::bsCheckbox($name, $label, null, $tagParams) }}
            @break
            @case('select')
                {{ Form::bsSelect(
                $name,
                $label,
                array_get($inputParams, '1'),
                array_get($inputParams, '2'),
                array_has($inputParams, '3') ? array_get($inputParams, '3') : []) }}
            @break
            @case('submit')
                {{ Form::bsSubmit($label, $tagParams) }}
            @break
        @endswitch
        </div>
    </div>
@endforeach
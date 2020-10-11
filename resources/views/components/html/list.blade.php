<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <abbr title="{{ _i('Fill input and press enter to filter result') }}" class="navbar-brand" href="#">{{ _i('Filter') }}</abbr>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filterItems" aria-controls="filterItems" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="filterItems">
        <div class="navbar-nav mr-auto">
            @php($filter = false)
            @foreach($cols as $i => $col)
                {{-- enable filter column --}}
                @if(array_get($col, '1') === true)
                    {{ Form::open(['method' => 'get', 'class' => 'm-1']) }}
                    <div>{{ Form::text($i, null, ['placeholder' => array_get($col, '0')]) }}</div>
                    @php($filter = true)
                    {{ Form::close() }}
                @endif
            @endforeach
        </div>
        @if($filter)
            <div class="navbar-nav m-1 my-lg-0"><a title="{{ _i('Reset filter') }}" href="{{ url()->current() }}" class="btn btn-primary pull-right">{{ _i('Reset') }} <i class="fas fa-filter"></i></a></div>
        @endif
    </div>
</nav>

@if($data->count() > 0)
    <div class="container-fluid">
        <div class="row my-3">
            @foreach($cols as $i => $col)
                <div class="{{ $loop->index === 0 ? 'col-4' : 'col' }}"><strong>{{ array_get($col, '0') }}</strong></div>
            @endforeach
            <div class="col-2"></div>
        </div>
        @foreach($data->toArray(0) as $j => $item)
            <div class="row my-3">
                @foreach($cols as $row => $var)
                    <div class="{{ $loop->index === 0 ? 'col-4' : 'col' }}">{{ array_get($item, $row) }}</div>
                @endforeach
                <div class="col-2 justify-content-end">@include('components.html.list_buttons')</div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-warning">{{ _i('I don\'t have any records!') }}</div>
@endif
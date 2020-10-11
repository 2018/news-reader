<ul class="{{ $attributes['class'] }}">
    @foreach($items as $i => $title)
    <li class="nav-item @if(strpos(url()->current(), route($i)) !== false) active @endif">
        <a class="nav-link" href="{{ route($i) }}">{{ _i($title) }}<span class="sr-only">(current)</span></a>
    </li>
    @endforeach
</ul>

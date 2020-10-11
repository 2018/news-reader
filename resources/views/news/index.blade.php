@extends('layouts.app')
@section('title', _i('News list'))
@section('list_buttons')
    {{ Form::open(['route' => 'news.index']) }}
    {{ Form::bsSubmit(_i('Fetch news')) }}
    {{ Form::close() }}
@endsection
@section('content')
    {{ Html::bsList($data,
    [
        'title' => [_i('Title'), true],
        'author' => [_i('Author'), true],
        'pub_date' => [_i('Publication date'), true],
    ]) }}
@endsection

@extends('layouts.app')
@section('title', _i('Detail'))
@section('list_buttons')
    <a class="btn btn-link" href="{{ route('news.index') }}">{{_i('Back to news')}}</a>
@endsection
@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-6">
                @if($model->image)
                <img src="{{ url("/images/large/{$model->image}") }}" class="img-fluid" alt="{{ $model->title }}">
                @endif
            </div>
            <div class="col-6">
                @if($model->title)
                <h2>{{ $model->title }}</h2>
                @endif
                @if($model->pub_date)
                <p>{{ $model->pub_date }}</p>
                @endif
                @if($model->description)
                <p>{{ $model->description }}</p>
                @endif
                @if($model->author)
                <p><i>{{ $model->author }}</i></p>
                @endif
                @if($model->link)
                <p><a href="{{ $model->link }}" target="_blank">{{ _i('Full news see on rbc.ru') }}</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection

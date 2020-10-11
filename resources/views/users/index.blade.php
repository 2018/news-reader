@extends('layouts.app')
@section('title', _i('Users list'))
@section('list_buttons')
    <div><a class="btn btn-success" href="{{ route('users.create') }}">{{ _i('Create') }}</a></div>
@endsection
@section('content')
    {{ Html::bsList($data, [
        'name' => [_i('User name'), true],
        'email' => [_i('E-mail address'), true],
    ]) }}
@endsection

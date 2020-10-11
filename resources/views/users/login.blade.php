@extends('welcome')
@section('title', _i('Login form'))
@section('content')
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">{{config('app.name')}}</h1>
    </div>
    {{ Form::open(['route' => 'login', 'class' => 'form-signin']) }}
        {{ Form::bsFields(
            [
                'name' => ['text' => [_i('User name')]],
                'password' => ['password' => [_i('Password')]],
                'remember' => ['checkbox' => [_i('Remember me')]],
                'submit' => ['submit' => [_i('Submit')]],
            ]
        ) }}
    {{ Form::close() }}
@endsection

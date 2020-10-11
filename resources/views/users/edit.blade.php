@extends('layouts.app')
@section('title', _i('Update user'))
@section('content')
    {{ Form::model(array_get($data, 'resource'), ['route' => ['users.update', array_get($data, 'id')], 'method' => 'put']) }}
    @include('users.form_fields')
    {{ Form::close() }}
@endsection

@extends('layouts.app')
@section('title', _i('Create user'))
@section('content')
    {{ Form::open(['route' => 'users.store']) }}
    @include('users.form_fields')
    {{ Form::close() }}
@endsection

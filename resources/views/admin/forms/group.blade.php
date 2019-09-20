@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'user_id'])
    @include('partials.admin.form.text', ['attribute' => 'name'])
    @include('partials.admin.form.submit')
@endsection

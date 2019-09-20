@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'group_id'])
    @include('partials.admin.form.dropdown', ['attribute' => 'mikrotik_id'])
    @foreach (['name' => 'name', 'gateway' => 'gateway', 'type' => 'type'] as $attribute => $type)
        @include('partials.admin.form.text')
    @endforeach
    @include('partials.admin.form.submit')
@endsection

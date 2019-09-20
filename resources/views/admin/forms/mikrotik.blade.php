@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @foreach (['name' => 'name', 'url' => 'url'] as $attribute => $type)
        @include('partials.admin.form.text')
    @endforeach
    @include('partials.admin.form.submit')
@endsection

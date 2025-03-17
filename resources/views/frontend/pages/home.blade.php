@extends('frontend.index')

@section('content')
    @include('frontend.components.navbar')
    @include('frontend.components.featured')
    @include('frontend.components.categories')
    @include('frontend.components.offer')
    @include('frontend.components.trendy')
    @include('frontend.components.subscribe')
    @include('frontend.components.justarrived')
    @include('frontend.components.brand')
@endsection


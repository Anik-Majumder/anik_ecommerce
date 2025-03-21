@extends('backend.layout.master')

@section('title','Admins')

@push('css')
    <style></style>
@endpush

@section('content')
    
    <div style="margin-top: 200px">
    <h1> Welcome {{ Auth::guard('admin')->user()->name ?? '' }}</h1>
    </div>
    
@endsection


@push('js')
    <script></script>
@endpush
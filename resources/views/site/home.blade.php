@extends('site.layout')

@section('title', 'This is our home page')

@section('content')
    
    {{-- {{ isset($name) ? 'existe' : 'not exist' }} --}}

    {{ $test ?? 'pattern' }}

@endsection
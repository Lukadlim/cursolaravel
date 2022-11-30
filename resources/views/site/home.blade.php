@extends('site.layout')
@section('title', 'This is our home page')

@section('content')

    @include('includes.message', ['title' => 'Success message!'])

    @component('components.sidebar')
        @slot('paragraph')
            Random text from slot
        @endslot
    @endcomponent
    
@endsection


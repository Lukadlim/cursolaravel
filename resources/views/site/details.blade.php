@extends('site.layout')
@section('title', 'This is our home page')

@section('content')

    <div class="row container">
        <div class="col s12 m6">
            <img src="{{ $product->image }}" class="responsive-img">
        </div>
        
        <div class="col s12 m6">
            <p style="font-size: 2em"> {{ $product->name }} </p>
            <p> {{ $product->description }} </p>
            <button class="btn orange btn-large">Buy</button>
        </div>
    </div>

@endsection

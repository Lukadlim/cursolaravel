@extends('site.layout')
@section('title', 'This is our home page')

@section('content')

    <div class="row container">

        <br>

        <div class="col s12 m6">
            <img src="{{ $product->image }}" class="responsive-img">
        </div>
        
        <div class="col s12 m6">
            <p style="font-size: 2em"> {{ $product->name }} </p>
            <p style="font-size: 2em"> US$ {{ number_format($product->price, 2, ',', '.') }} </p>
            <p> {{ $product->description }} </p>
            <p>
                Posted by: {{ $product->user->firstname }} <br>
                Category: {{ $product->category->name }}
            </p>

            <form action=" {{route('site.addcart')}} " method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="number" name="qnt" value="1" min="0">
                <input type="hidden" name="img" value="{{$product->image}}">

                <button class="btn orange btn-large">Buy</button>
            </form>

            
        </div>
    </div>

@endsection

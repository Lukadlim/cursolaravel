@extends('site.layout')
@section('title', 'Shopping cart')

@section('content')

    <div class="row container">

        <h1 style="font-size: 2em" >You have {{$items->count()}} item(s) in your cart.</h1>

        <table class="striped">

            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                        <td>{{$item->name}}</td>
                        <td>US$ {{ number_format($item->price, 2, ',', '.') }}</td>
                        <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="quantity" value="{{$item->quantity}}" min="0"></td>
                        <td>
                            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row container center">
            <button class="btn waves-effect waves-light blue"> Keep buying <i class="material-icons right">arrow_back</i></button>
            <button class="btn waves-effect waves-light blue"> Clear all <i class="material-icons right">clear</i></button>
            <button class="btn waves-effect waves-light green"> Checkout <i class="material-icons right">check</i></button>
        </div>

@endsection





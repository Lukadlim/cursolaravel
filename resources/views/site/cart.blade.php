@extends('site.layout')
@section('title', 'Shopping cart')

@section('content')

    <div class="row container">

        @if ($message = Session::get('success'))
            <div class="card green">
                <div class="card-content white-text">
                  <span class="card-title">Congratulations!!</span>
                  <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($message = Session::get('notice'))
            <div class="card blue">
                <div class="card-content white-text">
                  <span class="card-title">Notice!</span>
                  <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($items->count() == 0)
            <div class="card orange">
                <div class="card-content white-text">
                <span class="card-title">Your cart is empty</span>
                <p>Enjoy our promotions</p>
                </div>
            </div>
        @else

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

                            <form action=" {{route('site.updatecart')}} " method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">

                            {{-- Quantity of items --}}
                            <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="quantity" value="{{$item->quantity}}" min="1"></td>

                            <td>
                                {{-- Update button --}}
                                <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                            </form>

                                {{-- Remove button --}}
                                <form action=" {{route('site.removecart')}} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 style="font-size: 1.8em">  </h2>

            <div class="card orange">
                <div class="card-content white-text">
                <span class="card-title">Total: US$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                <p>or pay in 12 interest-free installments!</p>
                </div>
            </div>

        @endif

        <div class="row container center">
            <a href=" {{route('site.index')}} " class="btn waves-effect waves-light blue"> Keep buying <i class="material-icons right">arrow_back</i></a>
            <a href=" {{route('site.clearcart')}} " class="btn waves-effect waves-light blue"> Clear all <i class="material-icons right">clear</i></a>
            <button class="btn waves-effect waves-light green"> Checkout <i class="material-icons right">check</i></button>
        </div>

@endsection





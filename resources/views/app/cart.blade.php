@extends('layouts.main')
@section('title', 'Cart - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row">
        <h1 class="text-white py-2 ps-4">Shopping Cart</h1>
        <hr class="text-white">
        <div class="col-11 col-md-8">
            <div class="row justify-content-center">
                @if($carts)
                    @for ($i = 0; $i < count($carts); $i++)
                    <div class="col-8 col-md-5">
                        <div class="card bg-secondary border mb-3 text-white" style="max-height:500px;min-height:300px">
                            <img src="{{ url("storage/{$carts[$i][0]->image}") }}" class="card-img-top" alt="{{$carts[$i][0]->name}}">
                            <div class="card-body">
                                <h6 class="card-title">{{$carts[$i][0]->name}}</h6>
                                <hr>
                                <p class="card-text">$ {{$carts[$i][0]->value}}</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                @else
                    <h3 class="text-white text-center">Empty cart.</h3>
                @endif
            </div>
        </div>
        <div class="col-11 col-md-4 text-white border-start border-top" style="min-height: 400px;">
            <ul class="pt-2">
                @if($carts)
                    @for ($i = 0; $i < count($carts); $i++)
                        <div class="d-flex">
                            <h4>{{$carts[$i][0]->name}} - <small class="h6">${{$carts[$i][0]->value}}</small></h4>
                            <form action="/cart/unset/{{$carts[$i][0]->id}}" method="post">
                                @csrf
                                <button type="submit" class="btn-sm btn-danger ms-3">X</button>
                            </form>
                        </div>
                    @endfor
                @else
                    <h3>...</h3>
                @endif
            </ul>
            <hr>
            <small>Payment:</small>
            <select class="form-select" style="max-width: 130px;">
                <option>Credit card</option>
                <option>Debit card</option>
                <option>Pix</option>
                <option>PayPal</option>
            </select>
            <hr>
            <div class="text-center">
                <h6>Total:</h6>
                <h2>${{$total}}</h2>
                <div class="d-grid">
                    <button class="btn btn-success" type="button">Purchase</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
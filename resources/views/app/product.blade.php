@extends('layouts.main')
@section('title', 'Products - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row text-white p-3 justify-content-center">
        <div class="col-12 col-sm-4 border-end">
            <h4>Categories</h4>
            <hr class="text-white">
            <ul class="fs-5">
                <li><a href="?category=console">Consoles</a></li>
                <li><a href="?category=game">Games</a></li>
                <li><a href="?category=accessory">Accessories</a></li>
            </ul>
            <hr>
        </div>
        <div class="col-8">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-sm-4">
                    <a href="/products/{{$product->id}}" style="color:white;">
                        <div class="card bg-secondary border mb-3" style="max-height:500px;min-height:300px">
                            <img src="{{ url("storage/{$product->image}") }}" class="card-img-top" alt="{{$product->name}}">
                            <div class="card-body">
                                <h6 class="card-title">{{$product->name}}</h6>
                                <hr>
                                <p class="card-text">$ {{$product->value}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('title', 'Product - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row justify-content-center">
        <div class="col-11 col-md-8">
            <div class="card bg-secondary border my-5 p-2 text-white">
                <div class="row g-0">
                    <div class="col-md-5 d-flex align-items-center">
                        <img src="{{ url("storage/{$product->image}") }}" class="img-fluid" alt="{{$product->name}}">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
                            <hr class="text-white">
                            <p class="card-text">$ {{$product->value}}</p>
                            <hr class="text-white">
                            <form action="/cart/{{$product->id}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                            <hr class="text-white">
                            <small>Announced by: <strong>{{$user->name}}</strong></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
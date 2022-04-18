@extends('layouts.main')
@section('title', 'Home - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row pt-3 justify-content-center">
        <img src="{{ url('storage/design/banner.jpg') }}" alt="gen-banner" class="img-fluid" style="max-height:400px;max-width:1000px">
    </div>
    <hr class="text-white">
    <div class="row ps-3 pe-3">
        <h2 class="text-white ms-3">Consoles</h2>
        @foreach ($consoles as $console)
        <div class="col-6 col-sm-3">
            <div class="card bg-secondary border mb-3" style="max-height:500px;min-height:300px">
                <img src="{{ url("storage/{$console->image}") }}" class="card-img-top" alt="{{$console->name}}">
                <div class="card-body">
                    <p class="card-text">$ {{$console->value}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-6 col-sm-3 text-center">
            <div class="card bg-dark text-white border mb-3" style="max-height:500px;min-height:300px">
                <div class="card-body">
                    <p class="card-text"><a href="/products?category=console">More</a></p>
                </div>
            </div>
        </div>
        <hr class="text-white">
        <div class="row ps-3 pe-3">
            <h2 class="text-white ms-3">Games</h2>
            @foreach ($games as $game)
            <div class="col-6 col-sm-3">
                <div class="card bg-secondary border mb-3" style="max-height:500px;min-height:300px">
                    <img src="{{ url("storage/{$game->image}") }}" class="card-img-top" alt="{{$game->name}}">
                    <div class="card-body">
                        <p class="card-text">$ {{$game->value}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-6 col-sm-3 text-center">
                <div class="card bg-dark text-white border mb-3" style="max-height:500px;min-height:300px">
                    <div class="card-body">
                        <p class="card-text"><a href="/products?category=game">More</a></p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="text-white">
        <div class="row justify-content-between p-5 fs-5">
            <div class="col-12 col-sm-3"><a href="/products?category=console"><i class="bi bi-controller"></i> Consoles</a></div>
            <div class="col-12 col-sm-3"><a href="/products?category=game"><i class="bi bi-bug"></i> Games</a></div>
            <div class="col-12 col-sm-3"><a href="/products?category=accessory"><i class="bi bi-joystick"></i> Accessories</a></div>
        </div>
    </div>
    @endsection
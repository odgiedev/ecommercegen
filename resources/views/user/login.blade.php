@extends('layouts.main')
@section('title', 'Login - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row justify-content-center">
        <div class="col-11 col-sm-4 m-3">
            <div class="card bg-secondary border rounded text-white">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <form action="/login" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                        <hr class="text-white">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-light my-1">Login</button>
                        <small class="ms-5">Don't have an account? <a href="/register">Sign up</a> </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
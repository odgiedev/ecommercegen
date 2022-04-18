@extends('layouts.main')
@section('title', 'Register - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row justify-content-center">
        <div class="col-11 col-sm-4 m-3">
            <div class="card bg-secondary border rounded text-white">
                <div class="card-header">
                    <h3>Sign up</h3>
                </div>
                <form action="/users/create" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="text" name="name" placeholder="Your name" class="form-control" value="{{ old('name') }}">
                        <hr class="text-white">
                        <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                        <hr class="text-white">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <hr class="text-white">
                        <input type="password" name="repeat-password" placeholder="Repeat password" class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-light my-1">Sign up</button>
                        <small class="ms-4">Already have an account? <a href="/login">Sign in</a> </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
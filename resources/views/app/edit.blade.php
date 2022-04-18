@extends('layouts.main')
@section('title', 'Edit - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card bg-secondary text-white p-2 my-5">
                <h2 class="text-white ms-2">Update</h2>
                <hr>
                <form action="/products/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="image" class="form-control">
                        <hr>
                        <input type="text" name="name" class="form-control" placeholder="Product name" value="{{$product->name}}">
                        <hr>
                        <input type="text" name="value" class="form-control" placeholder="Product value" value="{{$product->value}}">
                        <hr>

                        <small class="p-1">Category</small>
                        <select name="category" class="form-select">
                            <option>Console</option>
                            <option>Game</option>
                            <option>Accessory</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
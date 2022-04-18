@extends('layouts.main')
@section('title', 'Dashboard - Gen')

@section('content')
<div class="container bg-dark">
    @include('partials.msg')
    <div class="row justify-content-center">
        <div class="col-11">
            <button type="button" class="btn btn-outline-light mt-3" data-bs-toggle="modal" data-bs-target="#newProductModal">
                New product
            </button>
            <h2 class="text-white mt-3">Your products:</h2>
            <div class="modal fade" id="newProductModal" tabindex="-1" aria-labelledby="newProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newProductModalLabel">New product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/products/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="file" name="image" class="form-control">
                                <hr>
                                <input type="text" name="name" class="form-control" placeholder="Product name">
                                <hr>
                                <input type="text" name="value" class="form-control" placeholder="Product value">
                                <hr>

                                <small class="p-1">Category</small>
                                <select name="category" class="form-select">
                                    <option>Console</option>
                                    <option>Game</option>
                                    <option>Accessory</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="text-white">
            <table class="table table-dark table-striped text-white">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                        <th scope="col">Category</th>
                        <th scope="col">#</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                @foreach ($user_products as $product)
                <tbody>
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->value}}</td>
                        <td>{{$product->category}}</td>
                        <td><a href="/products/edit/{{$product->id}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="/products/delete/{{$product->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal{{$product->id}}">
                                    Delete
                                </button>

                                <div class="modal fade" id="deleteProductModal{{$product->id}}" tabindex="-1" aria-labelledby="deleteProductModal{{$product->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteProductModal{{$product->id}}Label">Delete '{{$product->name}}'? </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
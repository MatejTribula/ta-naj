@extends('layouts.admin-layout')

<link rel="stylesheet" href="{{ 'css/admin-dashboard.css' }}">


@section('body')
    <div class="container-fluid page-body-wrapper">
        <div class="product-container">
            <h1>All Products</h1>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table>
                <tr class="head">
                    <td>Title</td>
                    <td>Type</td>
                    <td>Color</td>
                    <td>Price</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td>Image</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>

                @foreach ($data as $product)
                    <tr class="product">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->type }}</td>
                        <td>
                            <div class="color" style="background-color: {{ $product->color }};"></div>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td><img src="/productimage/{{ $product->image }}" alt="image"></td>
                        <td><a href="{{ url('update-view', $product->id) }}" class="btn btn-primary"> Update</a></td>
                        <td><a href="{{ url('delete-product', $product->id) }}" class="btn btn-danger"> Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection

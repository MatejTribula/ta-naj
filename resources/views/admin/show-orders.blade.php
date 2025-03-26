@extends('layouts.admin-layout')

<link rel="stylesheet" href="{{ 'css/admin-dashboard.css' }}">


@section('body')
    <div class="container-fluid page-body-wrapper">
        <div class="product-container">
            <h1>All Orders</h1>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table>
                <tr class="head">
                    <td>Name</td>
                    <td>Surname</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Country</td>
                    <td>City</td>
                    <td>Postal</td>
                    <td>Products</td>
                    <td>Total</td>
                    <td>State</td>
                </tr>

                @foreach ($data as $order)
                    <tr class="product">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->surname }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->country }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->postal_code }}</td>
                        <td>
                            @foreach (json_decode($order->products, true) as $product)
                                <div>
                                    <p>Name: {{ $product['product_title'] }}</p>
                                    <p>Price: {{ $product['price'] }}</p>
                                </div>
                            @endforeach
                        </td>
                        <td>{{ $order->total_amount }}€</td>
                        <td>{{ $order->state }}</td>



                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection

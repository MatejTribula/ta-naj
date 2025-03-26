<!-- admin.show-ordered-products.blade.php -->
@extends('layouts.admin-layout')

<link rel="stylesheet" href="{{ 'css/admin-dashboard.css' }}">

@section('body')
    <div class="container-fluid page-body-wrapper">
        <div class="product-container">
            <h1>Show Ordered Products</h1>

            <table>
                <tr class="head">
                    <td>Product Name</td>
                    <td>Price</td>
                </tr>
                {{--
                @foreach (json_decode($order->products, true) as $product)
                    <tr class="product">
                        <td>{{ $product['product_title'] }}</td>
                        <td>{{ $product['price'] }}</td>
                    </tr>
                @endforeach --}}
            </table>

        </div>
    </div>
@endsection

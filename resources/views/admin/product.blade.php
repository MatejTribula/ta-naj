@extends('layouts.admin-layout')

<link rel="stylesheet" href="{{ 'css/admin-dashboard.css' }}">

@section('body')
    <div class="container-fluid page-body-wrapper">
        <div class="product-container">
            <h1>Add Product</h1>


            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="product-form" action="{{ url('upload-product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="label-input">
                    <label for="title">Product title</label>
                    <input id="title" type="text" name="title" placeholder="Give a Product title" required>
                </div>
                <div class="label-input">
                    <label for="type">Type</label>

                    <select name="type" id="type" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Sorbet">Sorbet</option>
                        <option value="Gelato">Gelato</option>
                    </select>
                </div>

                <div class="label-input">
                    <label for="color">Color</label>

                    <select name="color" id="color" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="#FFCB8C">Broskyňa</option>
                        <option value="#966857">Čokoláda</option>
                        <option value="#FF7C7C">Jahoda</option>
                        <option value="#FFD4F5">Jogurt</option>
                        <option value="#EAB17D">Karamel</option>
                        <option value="#E3F9D9">Kiwi/Egreš</option>
                        <option value="#FF8CA8">Malina</option>
                        <option value="#FBDA85">Mango</option>
                        <option value="#CFE7C4">Pistácia</option>
                        <option value="#FA7D96">Slivka</option>
                        <option value="#FFF4E1">Vanilka</option>
                    </select>
                </div>
                <div class="label-input">
                    <label for="price">Price</label>
                    <input id="price" type="number" name="price" placeholder="Give a Price" required>
                </div>
                <div class="label-input">
                    <label for="desc">Description</label>
                    <input id="desc" type="text" name="desc" placeholder="Give a Description" required>
                </div>
                <div class="label-input">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" type="number" name="quantity" placeholder="Product Quantity" required>
                </div>


                <input type="file" name="file" id="file">



                <button type="submit">Submit</button>


            </form>
        </div>
    </div>
@endsection

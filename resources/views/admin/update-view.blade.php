@extends('layouts.admin-layout')

<base href="/public">
<link rel="stylesheet" href="{{ 'css/admin-dashboard.css' }}">


@section('body')
    <div class="container-fluid page-body-wrapper">
        <div class="product-container">
            <h1>Update Product</h1>


            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="product-form" action="{{ url('/update-product', $data->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="label-input">
                    <label for="title">Product title</label>
                    <input id="title" type="text" name="title" placeholder="Give a Product title"
                        value="{{ $data->title }}">
                </div>
                <div class="label-input">
                    <label for="type">Type</label>

                    <select name="type" id="type" required>
                        <option value="" disabled selected>Select your option</option>
                        @foreach (['Sorbet', 'Gelato'] as $type)
                            <option value="{{ $type }}" {{ $data->type == $type ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="label-input">
                    <label for="color">Color</label>

                    <select name="color" id="color" required>
                        <option value="" disabled>Select your option</option>
                        <option value="#FFCB8C" {{ $data->color == '#FFCB8C' ? 'selected' : '' }}>Broskyňa</option>
                        <option value="#966857" {{ $data->color == '#966857' ? 'selected' : '' }}>Čokoláda</option>
                        <option value="#FF7C7C" {{ $data->color == '#FF7C7C' ? 'selected' : '' }}>Jahoda</option>
                        <option value="#FFD4F5" {{ $data->color == '#FFD4F5' ? 'selected' : '' }}>Jogurt</option>
                        <option value="#EAB17D" {{ $data->color == '#EAB17D' ? 'selected' : '' }}>Karamel</option>
                        <option value="#E3F9D9" {{ $data->color == '#E3F9D9' ? 'selected' : '' }}>Kiwi/Egreš</option>
                        <option value="#FF8CA8" {{ $data->color == '#FF8CA8' ? 'selected' : '' }}>Malina</option>
                        <option value="#FBDA85" {{ $data->color == '#FBDA85' ? 'selected' : '' }}>Mango</option>
                        <option value="#CFE7C4" {{ $data->color == '#CFE7C4' ? 'selected' : '' }}>Pistácia</option>
                        <option value="#FA7D96" {{ $data->color == '#FA7D96' ? 'selected' : '' }}>Slivka</option>
                        <option value="#FFF4E1" {{ $data->color == '#FFF4E1' ? 'selected' : '' }}>Vanilka</option>
                    </select>
                </div>
                <div class="label-input">
                    <label for="price">Price</label>
                    <input id="price" type="number" name="price" placeholder="Give a Price"
                        value="{{ $data->price }}" required>
                </div>
                <div class="label-input">
                    <label for="desc">Description</label>
                    <input id="desc" type="text" name="desc" placeholder="Give a Description"
                        value="{{ $data->description }}" required>
                </div>
                <div class="label-input">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" type="number" name="quantity" placeholder="Product Quantity"
                        value="{{ $data->quantity }}" required>
                </div>

                <div class="label-input">
                    <label>Old Image</label>
                    <img src="/productimage/{{ $data->image }}" alt="image" width="75px">
                </div>

                <div class="label-input">
                    <label>Change the Image</label>
                    <input type="file" name="file" id="file">
                </div>




                <button type="submit">Submit</button>


            </form>
        </div>
    </div>
@endsection

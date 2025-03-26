@extends('layouts.layout')

@section('title', 'Košík')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="card order">

                <div class="pc-top">
                    <h4>Košík</h4>
                </div>
                <div class="pc-container">

                    @foreach ($cart as $carts)
                        <div class="pcc-item">
                            <div class="pci-image" style="background-color: {{ $carts->color }}">
                                <img src="productimage/{{ $carts->image }}" alt="#">
                            </div>
                            <div class="pci-content">

                                <div class="pci-info">
                                    <h5>{{ $carts->product_title }}</h5>
                                    <a href="{{ url('delete', $carts->id) }}"><i class="fa-solid fa-trash"></i></a>
                                </div>

                                <h5>{{ $carts->price }}€</h5>

                            </div>
                        </div>
                    @endforeach

                </div>
                @if ($count !== 0)
                    <a href="/billing-info" class="btn">Pokračovať v objednávke</a>
                @else
                    <p>Kosik je prazdny</p>
                @endif


            </div>
        </div>
    </section>
@endsection

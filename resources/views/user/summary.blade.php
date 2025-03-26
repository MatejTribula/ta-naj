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
                    <h4>Súhrn</h4>
                </div>

                <div class="pc-container summary-cart">
                    <h5>Košík</h5>
                    @foreach ($cart as $carts)
                        <div class="pcc-item">
                            <div class="pci-image" style="background-color: {{ $carts->color }}">
                                <img src="productimage/{{ $carts->image }}" alt="#">
                            </div>
                            <div class="pci-content">

                                <div class="pci-info">
                                    <h5>{{ $carts->product_title }}</h5>
                                </div>

                                <h5>{{ $carts->price }}€</h5>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pc-container summary-final">
                    <h4>Suma</h4>
                    <h4>
                        <h4>{{ $cart->sum('price') }}€</h4>
                    </h4>
                </div>
                <div class="pc-container summary-pickup">

                    <h5>Vyzdvihnutie</h5>
                    <div class="sp-container">
                        <strong>Sobotské námestie 14, 058 01 Poprad-Spišská Sobota</strong>
                        <div class="spc-hours">
                            <ul>
                                <li>Po-So</li>
                                <li>Ne</li>
                            </ul>
                            <ul>
                                <li>10:00-19:00</li>
                                <li>10:00-20:00</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pc-container summary-user-info">

                    <h5>Fakturačné údaje</h5>
                    <ul>
                        <li>{{ session('billing_info.name') }} {{ session('billing_info.surname') }}</li>
                        <li>{{ session('billing_info.address') }}</li>
                        <li>{{ session('billing_info.postal') }} {{ session('billing_info.city') }}</li>
                        <li>{{ session('billing_info.country') }}</li>
                        <li>{{ session('billing_info.tel') }}</li>
                        <li>{{ session('billing_info.email') }}</li>
                    </ul>
                </div>



                <div class="button-group">
                    <a href="/billing-info" class="btn">Spať</a>
                    <form method="POST" action="{{ url('/checkout') }}">
                        @csrf
                        <button type="submit" class="btn">Objednať</button>
                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection

@extends('layouts.layout')

@section('title', 'Produkty')
@section('css')
    <link rel="stylesheet" href="{{ 'css/products_page.css' }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="full-width-card">
                <div class="fwc-content">
                    <h3>Vychutnajte si kvalitnú remeselnú zmrzlinu!</h3>
                    <p>Všetká zmrzlina je vyrobená z kvalitných domácich potrávin, ktoré sú optimálne použité pre
                        dosiahnutie tej najlepšej chuti</p>
                </div>
            </div>
        </div>


        <div class="items">
            <div class="container">

                @foreach ($data as $product)
                    <div class="item-card" style="background-color: {{ $product->color }}">
                        <div class="ic-img">
                            <img src="/productimage/{{ $product->image }}" alt="obrázok zmrzliny">
                        </div>



                        <div class="ic-content">
                            <div class="ic-text">
                                <div class="headings">
                                    <h6>{{ $product->type }}</h6>
                                    <h5>{{ $product->title }}</h5>
                                </div>
                                <p class="ic-composition">{{ $product->description }}</p>
                            </div>
                            <div class="ic-order">
                                <h5 class="ic-price">{{ $product->price }}€</h5>

                                <form action="{{ url('addcart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn ic-cart">
                                        <i class="cart fa-solid fa-cart-shopping"></i>
                                    </button>
                                </form>
                            </div>


                        </div>
                    </div>
                @endforeach


            </div>
        </div>


    </section>
@endsection

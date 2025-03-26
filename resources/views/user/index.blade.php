@extends('layouts.layout')

@section('title', 'Domov')
@section('css')
    <link rel="stylesheet" href="{{ 'css/index_style.css' }}">
@endsection

@section('content')
    <main>
        <div class="hero-title">
            <div>
                <h1>TA NAJ</h1>
                <h1>TA NAJ</h1>
                <h1>TA NAJ.</h1>
            </div>
        </div>
    </main>


    <section class="items">
        <div class="container">

            @foreach ($data as $product)
                <div class="item-card hero-ic" style="background-color: {{ $product->color }}">
                    <div class="ic-img">
                        <img src="/productimage/{{ $product->image }}" alt="obrázok zmrzliny">
                    </div>

                    <div class="ic-content">
                        <div class="headings">
                            <h6>{{ $product->type }}</h6>
                            <h5>{{ $product->title }}</h5>
                        </div>

                        <h5 class="ic-price">{{ $product->price }}€</h5>
                        <form action="{{ url('addcart', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn ic-cart">
                                <i class="cart fa-solid fa-cart-shopping"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('products') }}">
                <div class="hero-ic next-ic">
                    <i class="fa-solid fa-chevron-right"></i>
                    <p>Viac produktov</p>
                </div>
            </a>
        </div>
    </section>


    <section class="sg-section">
        <div class="container">
            <div class="sg-card">
                <div class="sgc-container sgc-gelato">
                    <img src="{{ 'images/gelato_transparent.png' }}" alt="gelato">
                    <div class="sgc-content">
                        <div class="sgc-text">
                            <h3>Gelato</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, et nulla ab dolor deserunt
                                soluta
                            </p>
                        </div>
                        <div class="sgc-diff">
                            <p>Mliečne</p>
                            <p>Krémové</p>
                            <p>Jemné</p>
                        </div>
                    </div>
                </div>
                <div class="sgc-container sgc-sorbet">

                    <div class="sgc-content">
                        <div class="sgc-text">
                            <h3>Sorbet</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, et nulla ab dolor deserunt
                                soluta</p>
                        </div>
                        <div class="sgc-diff">
                            <p>Vegan</p>
                            <p>Krémový</p>
                            <p>Svieži</p>
                        </div>
                    </div>
                    <img src="{{ 'images/sorbet_transparent.png' }}" alt="sorbet">
                </div>
            </div>

            <div class="itc-group sg-prep">
                <div class="img-text-container">
                    <div class="images">
                        <div class="big-img one">
                            <div class="bi-shape"></div>
                            <div class="bi-image"></div>
                        </div>
                        <div class="sml-img one">
                            <div class="si-shape"></div>
                            <div class="si-image"></div>
                        </div>
                    </div>
                    <div class="itc-content">
                        <h2>Výber kvalitných a spracovanie surovín</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe et odit, quis voluptatem iure,
                            consequatur repellat exercitationem vel omnis praesentium perferendis atque tempora neque
                            explicabo ipsam ab, officiis nulla? Quis?</p>
                    </div>
                </div>

                <div class="img-text-container opposite">

                    <div class="itc-content">
                        <h2>Výber kvalitných a spracovanie surovín</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe et odit, quis voluptatem iure,
                            consequatur repellat exercitationem vel omnis praesentium perferendis atque tempora neque
                            explicabo ipsam ab, officiis nulla? Quis?</p>
                    </div>

                    <div class="images">
                        <div class="big-img two">
                            <div class="bi-shape"></div>
                            <div class="bi-image"></div>
                        </div>
                        <div class="sml-img two">
                            <div class="si-shape"></div>
                            <div class="si-image"></div>
                        </div>
                    </div>
                </div>

                <div class="img-text-container">
                    <div class="images">
                        <div class="big-img three">
                            <div class="bi-shape"></div>
                            <div class="bi-image"></div>
                        </div>
                        <div class="sml-img three">
                            <div class="si-shape"></div>
                            <div class="si-image"></div>
                        </div>
                    </div>
                    <div class="itc-content">
                        <h2>Výber kvalitných a spracovanie surovín</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe et odit, quis voluptatem iure,
                            consequatur repellat exercitationem vel omnis praesentium perferendis atque tempora neque
                            explicabo ipsam ab, officiis nulla? Quis?</p>
                    </div>
                </div>
            </div>

            <div class="full-width-card location-card">
                <div class="lc-content">
                    <h3>Sobotské námestie</h3>
                    <div class="icon-container">
                        <i class="fa-solid fa-location-pin"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

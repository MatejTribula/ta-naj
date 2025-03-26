@extends('layouts.layout')

@section('title', 'Fakturačné údaje')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
@endsection


@section('content')
    <section>
        <div class="container">
            <div class="card order">



                <div class="pc-top">
                    <h4>Fakturačné údaje</h4>
                </div>

                <form action="{{ url('/store-billing-info') }}" method="POST">
                    @csrf
                    <div class="label-input">
                        <label for="name">Meno</label>
                        <input type="text" name="name" id="name" required
                            value="{{ session('billing_info.name') }}">
                    </div>
                    <div class="label-input">
                        <label for="surname">Priezvisko</label>
                        <input type="surname" name="surname" id="surname" required
                            value="{{ session('billing_info.surname') }}">
                    </div>
                    <div class="label-input">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" required
                            value="{{ session('billing_info.email') }}">
                    </div>
                    <div class="label-input">
                        <label for="tel">Telefónne číslo</label>
                        <input type="number" name="tel" id="tel" required
                            value="{{ session('billing_info.tel') }}">
                    </div>
                    <div class="label-input">
                        <label for="address">Adresa</label>
                        <input type="text" name="address" id="address" required
                            value="{{ session('billing_info.address') }}">
                    </div>
                    <div class="label-input">
                        <label for="country">Krajina</label>
                        <input type="text" name="country" id="country" required
                            value="{{ session('billing_info.country') }}">
                    </div>
                    <div class="label-input">
                        <label for="city">Mesto</label>
                        <input type="text" name="city" id="city" required
                            value="{{ session('billing_info.city') }}">
                    </div>
                    <div class="label-input">
                        <label for="postal">PSČ</label>
                        <input type="number" name="postal" id="postal" required
                            value="{{ session('billing_info.postal') }}">
                    </div>
                    <div class="button-group">
                        <a href="/cart" class="btn">Spať</a>
                        <button type="submit" class="btn">Uložiť a pokračovať v objednávke</button>
                    </div>
                </form>







            </div>
        </div>
    </section>
@endsection

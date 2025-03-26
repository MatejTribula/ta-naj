@extends('layouts.layout')

@section('title', 'Registrácia')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
    <link rel="stylesheet" href="{{ 'css/one-page-style.css' }}">
@endsection


@section('content')
    <section>
        <div class="card sign-card register-card">
            <div class="img-container">
                <!-- You can add any image or content here -->
            </div>
            <div class="card sign-part register-part">
                <div class="pc-top">
                    <h4>Registrácia</h4>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="label-input">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="label-input">
                        <label for="password">Heslo</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="label-input">
                        <label for="password_confirmation">Zopakovať heslo</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    {{-- <div class="terms">
                        <input type="checkbox" name="terms" id="terms" required>
                        <p>Kliknutím súhlasíte s <a href="{{ route('terms.show') }}">obchodnými podmienkami</a></p>
                    </div> --}}
                    <button class="btn" type="submit">Registrovať sa</button>
                    <p>Vlastníte už konto? <a href="{{ route('login') }}">Prihláste sa</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection

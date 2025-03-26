@extends('layouts.layout')

@section('title', 'Prihlásenie')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
    <link rel="stylesheet" href="{{ 'css/one-page-style.css' }}">
@endsection

@section('content')
    <section>
        <div class="card sign-card login-card">
            <div class="img-container">
                <!-- You can add any image or content here -->
            </div>
            <div class="card sign-part login-part">
                <div class="pc-top">
                    <h4>Prihlásenie</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="label-input">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="label-input">
                        <div>
                            <label for="password">Heslo</label>
                            {{-- <a href="{{ route('password.request') }}">Zabudli ste heslo?</a> --}}
                        </div>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button class="btn" type="submit">Odoslať</button>
                    <p>Nemáte ešte konto? <a href="{{ route('register') }}">Registrujste sa</a></p>
                </form>
            </div>
        </div>


    </section>
@endsection

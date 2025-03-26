@extends('layouts.layout')

@section('title', 'Kontakt')
@section('css')
    <link rel="stylesheet" href="{{ 'css/contact.css' }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="full-width-card hero-card">
                <img src="{{ 'images/contact_png.png' }}" alt="">
                <h2>Kontakt</h2>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="contact-form-container">
                <div class="contact-content">
                    <h3>Naše kontakty</h3>
                    <div class="contacts">
                        <div class="contact">
                            <p>Adresa</p>
                            <strong>Sobotské námestie 14, 058 01 Poprad-Spišská Sobota</strong>
                        </div>

                        <div class="contact">
                            <p>Telefónne číslo</p>
                            <strong>090 1081 081</strong>
                        </div>

                        <div class="contact">
                            <p>E-mail</p>
                            <strong>tanaj@tanaj.tanaj</strong>
                        </div>

                        <div class="contact">
                            <p>Sociálne siete</p>
                            <div class="fb-socials">
                                <a target="_blank" href="https://www.facebook.com/ta.naj.poprad"><i
                                        class="fa-brands fa-facebook"></i></a>
                                <a target="_blank" href="https://www.instagram.com/ta.naj.poprad?igsh=ODUwNm81ajNpZTAy"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-content">
                    <h3>Pošlite nám správu</h3>
                    <form method="POST" action="{{ route('sendMail') }}">
                        @csrf
                        <div class="label-input">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="label-input">
                            <label for="message">Správa</label>
                            <textarea maxlength="300" name="message" id="message" required></textarea>
                        </div>

                        <button class="btn" type="submit">Odoslať</button>
                    </form>
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

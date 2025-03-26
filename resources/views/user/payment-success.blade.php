@extends('layouts.layout')

@section('title', 'Registrácia')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
    <link rel="stylesheet" href="{{ 'css/one-page-style.css' }}">
@endsection



@section('content')
    <section class="payment-container">
        <h1>
            <i class="fa-solid fa-check"></i>
        </h1>
        <h2>Platba bola úspešne spracovaná</h2>
        <a href="{{ route('index') }}" class="btn">Späť domov</a>

    </section>

@endsection

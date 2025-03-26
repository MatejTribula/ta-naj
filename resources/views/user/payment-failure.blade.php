@extends('layouts.layout')

@section('title', 'Registrácia')
@section('css')
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
    <link rel="stylesheet" href="{{ 'css/one-page-style.css' }}">
@endsection



@section('content')
    <section class="payment-container">
        <h1>
            <i class="fa-solid fa-xmark"></i>
        </h1>
        <h2>Platba neprešla</h2>
        <a href="{{ route('summary') }}" class="btn">Späť k objednávke</a>

    </section>

@endsection

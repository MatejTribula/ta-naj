@extends('layouts.layout')

@section('title', 'Náš príbeh')
@section('css')
    <link rel="stylesheet" href="{{ 'css/story.css' }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="full-width-card hero-card">
                <img src="{{ 'images/david_png.png' }}" alt="">
                <h2>Náš príbeh</h2>
            </div>
        </div>
    </section>

    <section class="story">
        <div class="container">
            <div class="itc-group">
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
        </div>
    </section>
@endsection

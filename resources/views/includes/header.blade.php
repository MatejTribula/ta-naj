<header>
    <nav>
        <div class="nav-content">
            <div id="headerCart" class="card popup-card pc-cart">
                <div class="pc-top">
                    <h4>Košík</h4>
                    <i class="cross fa-solid fa-xmark"></i>
                </div>

                <div class="pc-container">
                    <div class="pcc-item">
                        <div class="pci-image">
                            <img src="{{ 'images/placeholder_zmrzlina.png' }}" alt="#">
                        </div>
                        <div class="pci-content">
                            <h5>Jahodový cheesecake</h5>
                            <div class="pci-info">
                                <div class="count-controls">
                                    <i class="plus fa-solid fa-minus"></i>
                                    <p class="num">1</p>
                                    <i class="minus fa-solid fa-plus"></i>
                                </div>

                                <h5>10€</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn">Kúpiť</button>
            </div>
            <div id="headerUser" class="card popup-card pc-user">
                <div class="pc-top">
                    <h4>Vaše konto</h4>
                    <i class=" cross fa-solid fa-xmark"></i>
                </div>

                <ul>
                    <li><a href="#"><i class="fa-solid fa-list"></i>Osobné údaje</a></li>
                    <li><a href="#"><i class="fa-solid fa-box-archive"></i>Objednávky</a></li>
                </ul>


                <strong>Odhlásiť sa</strong>
            </div>



            <div class="logo-container">
                <a href="{{ route('index') }}"><img class="logo" src="{{ asset('images/logo.svg') }}"
                        alt="logo"></a>
            </div>

            @include('includes.links')


            @if (Route::has('login'))
                <div class="user-icons">
                    @auth
                        <a href="{{ url('cart') }}"><i id="navCart" class="cart fa-solid fa-cart-shopping"></i>
                            <div class="cart-count">{{ $count }}</div>
                        </a>
                        <x-custom-header></x-custom-header>
                    @else
                        <a href="{{ route('login') }}"><i id="navUser" class="user fa-solid fa-user"></i></a>


                    @endauth
                    <i id="navHamburger" class="menu fa-solid fa-bars"></i>
                </div>
            @endif

        </div>
        </div>
    </nav>

</header>

<div id="hamburgerMenu" class="hamburger-menu">
    <nav>
        <div class="nav-content">
            <div class="logo-container">
                <a href="{{ route('index') }}"><img class="logo" src="{{ asset('images/logo.svg') }}" alt="logo"></a>
                <i class="cross fa-solid fa-xmark"></i>
            </div>

            @include('includes.links')

            @auth <!-- Check if the user is authenticated -->
                <div class="user-icons">
                    <ul class="user-info-buttons">
                        <li><a href="{{ url('cart') }}"><i class=" fa-solid fa-cart-shopping"></i>Košík</a></li>
                        <li><a href="{{ url('user/profile') }}"><i class="fa-solid fa-box-archive"></i>Osobné údaje</a></li>
                        <!-- Profile link -->
                    </ul>
                </div>
                <form method="POST" action="{{ route('logout') }}"> <!-- Logout form -->
                    @csrf
                    <button type="submit">Odhlásiť sa</button>
                </form>
            @else
                <div class="user-icons">
                    <ul class="user-info-buttons">
                        <li><a href="{{ route('login') }}"><i id="navUser" class=" fa-solid fa-user"></i>Prihlásenie</a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </nav>
</div>

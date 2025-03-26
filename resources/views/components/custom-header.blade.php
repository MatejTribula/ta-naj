<link rel="stylesheet" href="{{ 'css/custom-components.css' }}">


<div class="dropdown">
    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i id="navUser" class="user fa-solid fa-user"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ 'user/profile' }}">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">Odhlásiť sa</button>
        </form>
    </div>
</div>


<script src="{{ 'js/custom-components.js' }}"></script>

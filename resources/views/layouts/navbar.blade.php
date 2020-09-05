<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:navy">
                    <img src="{{ asset('assets/images/logo.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                    MENU
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/scrambler/playground">Play Game!</a>
                    <a class="dropdown-item" href="/result/history/">History Game</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/" onclick="return confirm('Are you sure to quit the game?')">Quit Game</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

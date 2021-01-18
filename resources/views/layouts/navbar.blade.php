<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{ route('articles') }}">Articles</a>
        </div>
    </div>
    <div class="navbar-nav float-right">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}" class="nav-item nav-link">Home</a>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

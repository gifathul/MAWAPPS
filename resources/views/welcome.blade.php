
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">NEXORA</a>

        <ul class="nav-links">
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Project</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        
<div class="auth-buttons">
    @guest
        <a href="{{ route('login') }}" class="btn-login">
            Login
        </a>

        <a href="{{ route('register') }}" class="btn-register">
            Register
        </a>
    @else
        <span class="user-name">
            {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-login">
                Logout
            </button>
        </form>
    @endguest
</div>

    </nav>

    <main class="content">
        <h1>The Projeck Still On Progres.</h1>
        <p>Navbar sederhana dengan desain modern.</p>
    </main>

</body>
</html>

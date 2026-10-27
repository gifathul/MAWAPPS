<nav class="maw-navbar">
    <a href="{{ route('dashboard') }}" class="maw-brand">
        MAWAPPS
    </a>

    <div class="maw-nav-links">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('notes.index') }}"
           class="{{ request()->routeIs('notes.*') ? 'active' : '' }}">
            Catatan Kuliah
        </a>

        <a href="{{ route('tasks.index') }}"
           class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">
            Manajemen Tugas
        </a>
    </div>

    <div class="maw-nav-user">
        <span>{{ Auth::user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</nav>

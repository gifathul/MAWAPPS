
<nav class="maw-navbar">

    <!-- BRAND -->
    <a href="{{ route('dashboard') }}" class="maw-brand">
        MAWAPPS
        <small>STUDENT WORKSPACE</small>
    </a>

    <!-- MENU NAVIGASI -->
    <div class="maw-nav-section">
        <p class="maw-nav-heading">MENU UTAMA</p>

        <div class="maw-nav-links">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="maw-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('notes.index') }}"
               class="{{ request()->routeIs('notes.*') ? 'active' : '' }}">
                <span class="maw-nav-icon">▤</span>
                <span>Catatan Kuliah</span>
            </a>

            <a href="{{ route('tasks.index') }}"
               class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                <span class="maw-nav-icon">☑</span>
                <span>Manajemen Tugas</span>
            </a>

            <a href="{{ route('academic-events.index') }}"
               class="{{ request()->routeIs('academic-events.*') ? 'active' : '' }}">
                <span class="maw-nav-icon">▦</span>
                <span>Kalender Akademik</span>
            </a>

        </div>
    </div>

    <!-- INFORMASI PENGGUNA -->
    <div class="maw-nav-user">
        <div class="maw-user-info">
            <span class="maw-user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </span>

            <span class="maw-user-name">
                {{ Auth::user()->name }}
            </span>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                Logout
            </button>
        </form>
    </div>

</nav>

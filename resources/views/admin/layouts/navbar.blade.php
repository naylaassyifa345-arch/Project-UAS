<nav class="navbar">
    <div class="left">
        <h3>@yield('page-title')</h3>
    </div>

    <div class="right">
        <span>{{ auth()->user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>

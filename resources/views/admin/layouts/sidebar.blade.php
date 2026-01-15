<aside class="sidebar">
    <h2 class="logo">Cafe Admin</h2>

    <ul class="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/admin/users"
               class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                Users
            </a>
        </li>

        <li>
            <a href="/admin/categories"
               class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                Kategori
            </a>
        </li>

        <li>
            <a href="/admin/menus"
               class="{{ request()->is('admin/menus*') ? 'active' : '' }}">
                Menu
            </a>
        </li>

        <li>
            <a href="/admin/transactions"
               class="{{ request()->is('admin/transactions*') ? 'active' : '' }}">
                Transaksi
            </a>
        </li>

        <li>
            <a href="/admin/stock-logs"
               class="{{ request()->is('admin/stock-logs*') ? 'active' : '' }}">
                Stock Log
            </a>
        </li>
    </ul>
</aside>

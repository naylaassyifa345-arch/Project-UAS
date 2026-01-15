<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="admin-wrapper">
    @include('admin.layouts.sidebar')

    <div class="main-content">
        @include('admin.layouts.navbar')

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>

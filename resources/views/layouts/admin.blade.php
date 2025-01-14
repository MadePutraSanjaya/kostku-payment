<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Sesuaikan dengan CSS Anda -->
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h2>Kost Admin</h2>
            <ul>
                <li><a href="{{ route('penghuni.index') }}">Penghuni</a></li>
                <li><a href="{{ route('kamar.index') }}">Kamar Kost</a></li>
            </ul>
        </aside>
        <main class="content">
            <header class="header">
                <h1>@yield('header', 'Admin Dashboard')</h1>
            </header>
            <div class="main-content">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

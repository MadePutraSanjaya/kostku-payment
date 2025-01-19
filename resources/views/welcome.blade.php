<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostKu Payment</title>
    <!-- Tambahkan CSS Framework seperti Bootstrap (opsional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4 class="p-3 text-center">KostKu Payment</h4>
        <nav>
            @auth
                @if (Auth::user()->role === \App\Http\Enums\Role::ADMIN)
                    <a href="{{ route('penghuni.index') }}">Penghuni</a>
                    <a href="{{ route('kamar.index') }}">Kamar Kost</a>
                    <a href="{{ route('tagihan.index') }}">Tagihan</a>
                    <a href="{{ route('pembayaran.index') }}">Pembayaran</a>
                @else
                <a href="{{ route('riwayat.index') }}">Riwayat</a>
                <a href="{{ route('pembayaran.index') }}">Pembayaran</a>
                @endif
            @else
                <p class="text-danger">User is not authenticated</p>
            @endauth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            
        </nav>
    </div>



    <div class="content">
        <div class="container">
            <header class="header">
                <h1>@yield('header')</h1>
            </header>
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Framework seperti Bootstrap (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

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
            <a href="{{ route('penghuni.index') }}">Penghuni</a>
            <a href="{{ route('kamar.index') }}">Kamar Kost</a>
            <a href="{{ route('tagihan.index') }}">Tagihan</a>
            <a href="{{ route('pembayaran.index') }}">Pembayaran</a>
        </nav>
    </div>

    <div class="content">
        <div class="container">
            <h1>Selamat Datang di KostKu Payment</h1>
            <p>Silakan pilih menu dari sidebar untuk memulai.</p>
        </div>
    </div>

    <!-- Tambahkan JS Framework seperti Bootstrap (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <!-- Link CSS Bootstrap dengan tema gelap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan style untuk tema gelap */
        body {
            background-color: #121212;
            color: white;
        }
        .navbar {
            border: 2px solid black; /* Border putih dengan ketebalan 2px */
        }
    </style>
</head>
<body class="bg-dark text-white">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">novelFire</a> <!-- Navbar dengan tulisan novelFire -->
        </div>
    </nav>

    <!-- Konten halaman -->
    <div class="container mt-4">
        @yield('content') <!-- Tempat untuk konten halaman lain -->
    </div>

    <!-- Script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

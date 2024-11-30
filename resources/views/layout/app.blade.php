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
            border: 1px solid black; /* Border putih dengan ketebalan 2px */
        }

        /* Styling Sidebar */
        .sidebar {
            height: 100vh; /* Mengisi seluruh tinggi halaman */
            width: 250px; /* Lebar sidebar */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c2f38;
            padding-top: 20px;
            padding-left: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #575d66;
            color: white;
        }

        /* Menyembunyikan sidebar di layar kecil */
        .sidebar.closed {
            transform: translateX(-250px);
        }

        /* Konten Halaman */
        .content {
            margin-left: 0;
            padding-top: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        .content.open {
            margin-left: 250px; /* Memberikan ruang untuk sidebar */
        }

        /* Navbar custom button untuk toggle sidebar */
        .navbar-toggler {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 24px;
        }

    </style>
</head>
<body class="bg-dark text-white">
    <!-- Navbar pertama (level atas) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Tombol untuk toggle sidebar (tombol kustom) -->
            <button class="navbar-toggler" type="button" aria-label="Toggle sidebar">
                ☰ <!-- Ikon Hamburger -->
            </button>
            <a class="navbar-brand mx-auto" href="#">novelFire</a> <!-- Navbar dengan tulisan novelFire -->
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar closed">
        <a href="/authors">Authors</a> <!-- Link menuju Authors -->
        <a href="/books">Books</a> <!-- Link menuju Books -->
    </div>

    <!-- Konten halaman -->
    <div id="content" class="content">
        @yield('content') <!-- Tempat untuk konten halaman lain -->
    </div>

    <!-- Script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mengambil referensi elemen-elemen
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.querySelector('.navbar-toggler');

        // Menangani klik pada tombol toggle sidebar
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('closed'); // Toggle class 'closed' pada sidebar
            content.classList.toggle('open');    // Toggle class 'open' pada konten

            console.log("Sidebar toggled!"); // Untuk memeriksa apakah toggle bekerja
        });
    </script>
</body>
</html>

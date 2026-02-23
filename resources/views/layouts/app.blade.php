<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c3e50;
            padding: 10px 20px;
            position: relative;
        }

        .navbar .logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }

        .navbar ul li a:hover {
            color: #1abc9c;
        }

        .menu-toggle {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                background: #34495e;
                position: absolute;
                top: 60px;
                right: 0;
                width: 200px;
                display: none;
            }

            .navbar ul.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
                cursor: pointer;
                color: white;
                font-size: 24px;
            }
        }

        /* ================= CONTENT ================= */
        .content {
            flex: 1;
            padding: 20px;
        }

        /* ================= FOOTER ================= */
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .footer-column h3 {
            margin-bottom: 10px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 8px;
        }

        .footer-column ul li a {
            text-decoration: none;
            color: #bdc3c7;
        }

        .footer-column ul li a:hover {
            color: #1abc9c;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #7f8c8d;
            font-size: 14px;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="logo">Nama Sekolah</div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <ul id="menu">
            <li><a href="#">Home</a></li>
            <li><a href="{{ route ('profil.sambutan') }}">Profil</a></li>
            <li><a href="#">Fasilitas</a></li>
            <li><a href="#">Prestasi</a></li>
            <li><a href="#">Eskul</a></li>
        </ul>
    </nav>

    {{-- CONTENT --}}
    <div class="content">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Nama Sekolah</h3>
                <p>Website resmi sekolah.</p>
            </div>

            <div class="footer-column">
                <h3>Menu</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('profil.sambutan') }}">Profil</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Eskul</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Kontak</h3>
                <p>Email: sekolah@email.com</p>
                <p>Telp: 0812-3456-7890</p>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Nama Sekolah. All rights reserved.
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('menu').classList.toggle('active');
        }
    </script>

</body>
</html>

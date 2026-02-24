<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f6f9;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #2c3e50 0%, #1a2632 100%);
            color: white;
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .logo-text,
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .dropdown-arrow,
        .sidebar.collapsed .badge,
        .sidebar.collapsed .profile-info,
        .sidebar.collapsed .footer-info {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            padding: 15px;
            justify-content: center;
        }

        .sidebar.collapsed .nav-link i {
            margin: 0;
            font-size: 20px;
        }

        .sidebar.collapsed .profile {
            justify-content: center;
            padding: 15px;
        }

        .sidebar.collapsed .submenu {
            position: absolute;
            left: 100%;
            top: 0;
            width: 220px;
            background: #2c3e50;
            border-radius: 0 8px 8px 0;
            display: none;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar.collapsed .nav-item:hover .submenu {
            display: block;
        }

        /* Logo Section */
        .logo {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 28px;
            color: #1abc9c;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
        }

        .logo-text span {
            color: #1abc9c;
        }

        /* Profile Section */
        .profile {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #1abc9c, #16a085);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            color: white;
            flex-shrink: 0;
        }

        .profile-info h4 {
            font-size: 15px;
            margin-bottom: 3px;
        }

        .profile-info p {
            font-size: 12px;
            opacity: 0.7;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .online-dot {
            width: 8px;
            height: 8px;
            background: #2ecc71;
            border-radius: 50%;
            display: inline-block;
        }

        /* Menu Navigation */
        .nav-menu {
            padding: 20px 0;
            list-style: none;
        }

        .nav-item {
            list-style: none;
            position: relative;
        }

        .nav-link {
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(26, 188, 156, 0.15);
            color: #fff;
            border-left-color: #1abc9c;
        }

        .nav-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .menu-text {
            flex: 1;
            font-size: 14px;
            font-weight: 500;
        }

        .badge {
            background: #1abc9c;
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .dropdown-arrow {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .nav-item.open > .nav-link .dropdown-arrow {
            transform: rotate(90deg);
        }

        /* Submenu */
        .submenu {
            list-style: none;
            padding-left: 42px;
            background: rgba(0, 0, 0, 0.2);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .nav-item.open .submenu {
            max-height: 400px;
        }

        .submenu .nav-link {
            padding: 10px 20px;
            font-size: 13px;
        }

        .submenu .nav-link i {
            font-size: 14px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 15px 20px;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            bottom: 0;
            background: #1a2632;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-info i {
            color: #1abc9c;
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            flex: 1;
            margin-left: 280px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - 280px);
        }

        .main-content.expanded {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        /* ================= TOP NAVBAR ================= */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 22px;
            color: #2c3e50;
            cursor: pointer;
            transition: 0.3s;
        }

        .menu-toggle:hover {
            color: #1abc9c;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #f4f6f9;
            padding: 8px 15px;
            border-radius: 10px;
            width: 300px;
        }

        .search-box i {
            color: #999;
            margin-right: 10px;
        }

        .search-box input {
            border: none;
            background: none;
            outline: none;
            width: 100%;
            font-size: 14px;
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .icon-btn {
            background: none;
            border: none;
            font-size: 18px;
            color: #2c3e50;
            cursor: pointer;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e74c3c;
            color: white;
            font-size: 10px;
            padding: 2px 5px;
            border-radius: 10px;
        }

        /* ================= CONTENT ================= */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f4f6f9;
        }

        /* ================= FOOTER ================= */ 
        .footer {
            background-color: white;
            color: #666;
            padding: 20px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.02);
            margin-top: auto;
            text-align: center;
        }
        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .search-box {
                width: 180px;
            }
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ================= DARK MODE ================= */
        body.dark-mode {
            background-color: #1a1a1a;
        }

        body.dark-mode .main-content {
            background-color: #1a1a1a;
        }

        body.dark-mode .top-navbar {
            background-color: #2d2d2d;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        body.dark-mode .menu-toggle,
        body.dark-mode .search-box i,
        body.dark-mode .icon-btn {
            color: #e0e0e0;
        }

        body.dark-mode .search-box {
            background-color: #2d2d2d;
        }

        body.dark-mode .search-box input {
            color: #e0e0e0;
        }

        body.dark-mode .search-box input::placeholder {
            color: #888;
        }

        body.dark-mode .content {
            background-color: #1a1a1a;
        }

        body.dark-mode .footer {
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .card {
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .table {
            color: #e0e0e0;
        }

        body.dark-mode .table-hover tbody tr:hover {
            background-color: #3d3d3d;
        }

        body.dark-mode .modal-content {
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .modal-header {
            border-bottom-color: #444;
        }

        body.dark-mode .modal-footer {
            border-top-color: #444;
        }

        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background-color: #3d3d3d;
            border-color: #555;
            color: #e0e0e0;
        }

        body.dark-mode .form-control:focus,
        body.dark-mode .form-select:focus {
            background-color: #3d3d3d;
            border-color: #1abc9c;
            color: #e0e0e0;
        }

        body.dark-mode .form-label {
            color: #e0e0e0;
        }

        body.dark-mode .btn-close {
            filter: invert(1);
        }

        body.dark-mode h2,
        body.dark-mode h1,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode h5,
        body.dark-mode h6 {
            color: #e0e0e0;
        }

        body.dark-mode .alert-success {
            background-color: #1e3a2f;
            border-color: #2ecc71;
            color: #2ecc71;
        }

        body.dark-mode .alert-danger {
            background-color: #3a1e1e;
            border-color: #e74c3c;
            color: #e74c3c;
        }

        body.dark-mode .badge.bg-primary {
            background-color: #0d6efd !important;
        }
    </style>
</head>
<body class="" id="body">

    {{-- SIDEBAR --}}
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-school"></i>
            <div class="logo-text">SMA <span>Negeri 1</span></div>
        </div>

        <!-- Profile -->
        <div class="profile">
            <div class="avatar">AD</div>
            <div class="profile-info">
                <h4>Admin Sekolah</h4>
                <p><span class="online-dot"></span> Online</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <ul class="nav-menu">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                    <span class="badge">3</span>
                </a>
            </li>

            <!-- Profil -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-school"></i>
                    <span class="menu-text">Profil</span>
                </a>
            </li>

            <!-- Eskul -->
            <li class="nav-item">
                <a href="{{ route('admin.eskul') }}" class="nav-link">
                    <i class="fas fa-futbol"></i>
                    <span class="menu-text">Eskul</span>
                </a>
            </li>

            <!-- Fasilitas -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span class="menu-text">Fasilitas</span>
                </a>
            </li>

            <!-- Prestasi -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-trophy"></i>
                    <span class="menu-text">Prestasi</span>
                </a>
            </li>

            <!-- User -->
            <li class="nav-item">
                <a href="{{ route('admin.user') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span class="menu-text">User</span>
                </a>
            </li>

            <div class="divider"></div>

            <!-- Logout -->
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="logout(); return false;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text">Logout</span>
                </a>
            </li>
        </ul>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="footer-info">
                <i class="fas fa-database"></i>
                <span>v1.0.0 | 2024</span>
            </div>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="main-content" id="mainContent">
        {{-- TOP NAVBAR --}}
        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 20px;">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari sesuatu...">
                </div>
            </div>

            <div class="nav-icons">
                <button class="icon-btn" onclick="showNotification()">
                    <i class="far fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <button class="icon-btn" onclick="showMessages()">
                    <i class="far fa-envelope"></i>
                    <span class="notification-badge">5</span>
                </button>
                <button class="icon-btn" onclick="toggleTheme()">
                    <i class="far fa-moon"></i>
                </button>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        <footer class="footer">
                &copy; {{ date('Y') }} SMA Negeri 1. All rights reserved.
        </footer>
    </div>

    <script>
        // Toggle Sidebar
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            
            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebarCollapsed', 'true');
            } else {
                localStorage.setItem('sidebarCollapsed', 'false');
            }
        });

        // Check saved state
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
        }

        // Dropdown Menu
        const menuItems = document.querySelectorAll('.has-submenu > .nav-link');
        
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                const parent = this.parentElement;
                const isOpen = parent.classList.contains('open');
                
                document.querySelectorAll('.has-submenu').forEach(submenu => {
                    if (submenu !== parent) {
                        submenu.classList.remove('open');
                    }
                });
                
                if (!isOpen) {
                    parent.classList.add('open');
                } else {
                    parent.classList.remove('open');
                }
            });
        });

        // Handle responsive
        function handleResponsive() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
                sidebar.classList.remove('active');
            }
        }

        window.addEventListener('resize', handleResponsive);
        handleResponsive();

        // Notification functions
        function showNotification() {
            alert('Anda memiliki 3 notifikasi baru');
        }

        function showMessages() {
            alert('Anda memiliki 5 pesan belum dibaca');
        }

        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.querySelector('.icon-btn[onclick="toggleTheme()"] i');
            
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                localStorage.setItem('darkMode', 'true');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                localStorage.setItem('darkMode', 'false');
            }
        }

        // Check saved dark mode state
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
            const themeIcon = document.querySelector('.icon-btn[onclick="toggleTheme()"] i');
            if (themeIcon) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        }

        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        if (searchInput) {
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    alert('Mencari: ' + this.value);
                }
            });
        }

        // Logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                alert('Anda telah logout');
            }
        }

        // Mobile menu toggle
        function toggleMenu() {
            sidebar.classList.toggle('active');
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

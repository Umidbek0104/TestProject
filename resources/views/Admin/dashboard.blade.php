<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - Bosh Sahifa</title>
    <link rel="stylesheet" href="{{ asset('/admin/css/styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0; padding: 0;
        }
        .navbar {
            background-color: #004085;
            color: white;
            padding: 10px 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .site-name {
            font-size: 20px;
            font-weight: bold;
        }
        .user-notification {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .notification {
            position: relative;
        }
        .notification-icon {
            font-size: 20px;
        }
        .notification-badge {
            background-color: red;
            color: white;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
            position: absolute;
            top: -8px; right: -8px;
        }
        .user-logo {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 0;
            list-style: none;
            z-index: 1000;
            min-width: 150px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu li {
            padding: 8px 15px;
        }
        .dropdown-menu li a {
            color: #333;
            text-decoration: none;
            display: block;
        }
        .sidebar-content {
            display: flex;
            min-height: calc(100vh - 52px);
        }
        .sidebar {
            background-color: #343a40;
            padding: 20px;
            width: 220px;
            color: white;
            flex-shrink: 0;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            padding: 40px;
            background-color: #f8f9fa;
        }
        h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #004085;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="site-name">Pazanda Admin</div>
    <div class="user-notification">
        <div class="notification">
            <span class="notification-icon"><i class="fas fa-bell"></i></span>
            <span class="notification-badge" id="notificationBadge">0</span>
        </div>
        <img src="{{ asset('/admin/img/user1.webp') }}" alt="User Logo" class="user-logo" />
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="adminDropdown">Admin</a>
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a href="#">Profilni Tahrirlash</a></li>
                <li><a href="{{ route('Auth.logout') }}">Chiqish</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Sidebar va Kontent -->
<div class="sidebar-content">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="{{ route('admin.all.posts') }}"><i class="fas fa-thumbtack me-2"></i> Postlar</a>
        <a href="{{ route('admin.posts.create') }}"><i class="fas fa-plus me-2"></i> Post Qo‘shish</a>
        <a href="{{ route('admin.all.categories') }}"><i class="fas fa-tags me-2"></i> Kategoriyalar</a>
        <a href="{{ route('admin.category.create') }}"><i class="fas fa-tag me-2"></i> Kategoriya Qo‘shish</a>
        <a href="{{ route('admin.all.tests') }}"><i class="fas fa-tasks me-2"></i> Testlar</a>
        <a href="{{ route('admin.create.tests') }}"><i class="fas fa-plus-circle me-2"></i> Test Qo‘shish</a>
    </div>

    <!-- Asosiy kontent -->
    <div class="main-content">
        <h1>Admin sahifaga xush kelibsiz</h1>
        {{-- Qo‘shimcha kontent shu yerda bo‘ladi --}}
    </div>
</div>

<script src="{{ asset('/admin/js/scripts.js') }}"></script>
</body>
</html>

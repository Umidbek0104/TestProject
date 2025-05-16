<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - Kategoriya Qo‘shish</title>
    <link rel="stylesheet" href="{{ asset('/admin/css/styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #004085;
            color: white;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            top: -8px;
            right: -8px;
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
            min-height: calc(100vh - 52px); /* Navbar balandligini chiqarib */
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

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
            background-color: white;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #33aeff);
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 15px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 25px 20px;
        }

        label.form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            font-size: 16px;
        }

        input.form-control {
            width: 100%;
            padding: 10px 12px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 25px; /* Inputlar orasidagi masofa */
            transition: border-color 0.3s;
        }

        input.form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px #007bff;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: -20px;
            margin-bottom: 20px;
        }

        .d-flex.justify-content-end {
            display: flex;
            justify-content: flex-end;
            gap: 20px; /* Tugmalar orasidagi masofa */
        }

        button.btn {
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        button.btn-success {
            background-color: #28a745;
            color: white;
        }

        button.btn-success:hover {
            background-color: #218838;
        }

        button.btn-outline-secondary {
            background-color: transparent;
            border: 2px solid #6c757d;
            color: #6c757d;
        }

        button.btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
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
            <span class="notification-badge" id="notificationBadge">3</span>
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
        <h3 class="text-primary fw-bold mb-4">
            <i class="fas fa-folder-plus me-2"></i> Yangi Kategoriya Qo‘shish
        </h3>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i> Kategoriya Ma'lumotlari
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <label for="category_name" class="form-label">Kategoriya Nomi</label>
                    <input
                        type="text"
                        id="category_name"
                        name="category_name"
                        class="form-control @error('category_name') is-invalid @enderror"
                        value="{{ old('category_name') }}"
                        placeholder="Masalan: Texnologiya"
                        required
                    />
                    @error('category_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="category_slug" class="form-label">Kategoriya Slug</label>
                    <input
                        type="text"
                        id="category_slug"
                        name="category_slug"
                        class="form-control @error('category_slug') is-invalid @enderror"
                        value="{{ old('category_slug') }}"
                        placeholder="Masalan: texnologiya"
                        required
                    />
                    @error('category_slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo"></i> Tozalash
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/admin/js/scripts.js') }}"></script>
</body>
</html>

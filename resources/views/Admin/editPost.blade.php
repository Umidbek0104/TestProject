<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Postni Tahrirlash</title>
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

        .site-name { font-size: 20px; font-weight: bold; }

        .user-notification {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-icon { font-size: 20px; }

        .notification-badge {
            background-color: red; color: white;
            font-size: 12px; padding: 2px 6px;
            border-radius: 50%;
            position: absolute; top: -8px; right: -8px;
        }

        .user-logo {
            width: 32px; height: 32px; border-radius: 50%;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0; top: 100%;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            list-style: none;
            min-width: 150px;
            padding: 5px 0;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu { display: block; }

        .dropdown-menu li { padding: 8px 15px; }
        .dropdown-menu li a { color: #333; text-decoration: none; display: block; }

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

        .sidebar a:hover { background-color: #495057; }

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 25px 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-outline-secondary {
            background-color: white;
            border: 1px solid #ccc;
            color: #333;
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
            <span class="notification-badge">0</span>
        </div>
        <img src="{{ asset('/admin/img/user1.webp') }}" alt="User Logo" class="user-logo" />
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Admin</a>
            <ul class="dropdown-menu">
                <li><a href="#">Profilni Tahrirlash</a></li>
                <li><a href="{{ route('Auth.logout') }}">Chiqish</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Sidebar & Content -->
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

    <!-- Content -->
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i> Postni Tahrirlash
            </div>
            <div class="card-body">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="title">Sarlavha</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>

                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>

                    <label for="content">Kontent</label>
                    <textarea id="content" name="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>

                    <label for="video_url">Video URL (ixtiyoriy)</label>
                    <input type="text" id="video_url" name="video_url" class="form-control" value="{{ old('video_url', $post->video_url) }}">

                    <label for="category_id">Kategoriya</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Tanlang</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="btn-group mt-3">
                        <a href="{{ route('admin.all.posts') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Orqaga
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Yangilash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

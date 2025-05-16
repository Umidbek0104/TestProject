<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - Testni Tahrirlash</title>
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
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
            background-color: white;
            max-width: 600px;
            margin: auto;
        }
        .card-header {
            background: linear-gradient(90deg, #007bff, #33aeff);
            color: white;
            font-weight: bold;
            font-size: 20px;
            padding: 15px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }
        .card-body {
            padding: 25px 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        .buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        .button {
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            color: white;
        }
        .button.green {
            background-color: #28a745;
        }
        .button.green:hover {
            background-color: #218838;
        }
        .button.yellow {
            background-color: #ffc107;
            color: black;
            text-align: center;
            line-height: normal;
        }
        .button.yellow:hover {
            background-color: #e0a800;
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
                <li><a href="editProfile.html">Profilni Tahrirlash</a></li>
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
        <div class="card">
            <div class="card-header">
                Testni Tahrirlash
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tests.update', $test->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Savol (Nomi)</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $test->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Tavsif (Description)</label>
                        <textarea id="description" name="description" rows="4">{{ old('description', $test->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategoriya</label>
                        <select name="category_id" id="category_id" required>
                            <option value="">Tanlang</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $test->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="correct_answer">To‘g‘ri Javob</label>
                        <input type="text" id="correct_answer" name="true_answer" value="{{ old('true_answer', $test->true_answer) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="wrong_answer1">Xato Javob 1</label>
                        <input type="text" id="wrong_answer1" name="false_answer1" value="{{ old('false_answer1', $test->false_answer1) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="wrong_answer2">Xato Javob 2</label>
                        <input type="text" id="wrong_answer2" name="false_answer2" value="{{ old('false_answer2', $test->false_answer2) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="wrong_answer3">Xato Javob 3</label>
                        <input type="text" id="wrong_answer3" name="false_answer3" value="{{ old('false_answer3', $test->false_answer3) }}" required>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="button green">Yangilash</button>
                        <a href="{{ route('admin.all.tests') }}" class="button yellow">Orqaga</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/admin/js/scripts.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('/admin/css/styles.css')}}">
    <style>
        /* Form styling */
        .post-create-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
        }

        .form-group1 {
            margin-bottom: 20px;
        }

        .form-group1 label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .form-group1 input,
        .form-group1 select,
        .form-group1 textarea {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group.buttons {
            display: flex;
            gap: 10px;
        }

        .button.green {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button.yellow {
            background-color: #ffc107;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Table styling */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* 1-chi va 2-chi ustun uchun o'zgarish */
        .table th:nth-child(1), .table td:nth-child(1),
        .table th:nth-child(2), .table td:nth-child(2) {
            padding-left: 5px;
            padding-right: 5px;
            width: 30px; /* Ustunlar kengligini 30px ga qisqartirish */
        }

        /* Margin between header and content */
        .navbar {
            margin-bottom: 10px; /* 10px masofa */
        }

        /* Center the title between header and content */
        .section-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px; /* 10px joy */
        }
    </style>
    @yield('styles')
</head>

<body>
<div class="navbar">
    <div class="admin-controls">
        <div class="site-name">Pazanda</div>
    </div>

    <div class="user-notification">
        <div class="notification">
            <span class="notification-icon">&#128276;</span>
            <span class="notification-badge" id="notificationBadge">0</span>
        </div>

        <img src="{{asset('/admin/img/user1.webp')}}" alt="User Logo" class="user-logo">

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="adminDropdown">Admin</a>
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a href="editProfile.html">Edit Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="sidebar-content">
    <div class="sidebar">
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
        <a href="{{route('admin.all.posts')}}">Po'stlartlar</a>
        <a href="{{route('admin.posts.create')}}">Po'st Qo'shish</a>
        <a href="{{route('admin.all.categories')}}">Categoriyalar</a>
        <a href="{{route('admin.category.create')}}">Categoriya Qo'shish</a>
        <a href="{{route('admin.all.tests')}}">Testlar</a>
        <a href="{{route('admin.create.tests')}}">Test Qo'shish</a>
    </div>

    <!-- Testlar Ro'yxati Header -->


    @yield('admin-content')
</div>

<script src="{{asset('/admin/js/scripts.js')}}"></script>
</body>
</html>

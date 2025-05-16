<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - Testlar Ro'yxati</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        .navbar {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .site-name {
            font-weight: bold;
            font-size: 20px;
        }
        .user-notification {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .notification {
            position: relative;
            cursor: pointer;
        }
        .notification-icon {
            font-size: 20px;
        }
        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: white;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
        }
        .user-logo {
            width: 36px;
            height: 36px;
            border-radius: 50%;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-toggle {
            color: white;
            text-decoration: none;
            cursor: pointer;
            user-select: none;
        }
        .dropdown-menu {
            position: absolute;
            top: 110%;
            right: 0;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            list-style: none;
            margin: 0;
            padding: 0;
            display: none;
            min-width: 150px;
            border-radius: 4px;
        }
        .dropdown-menu li a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
        }
        .dropdown-menu li a:hover {
            background: #f1f1f1;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .sidebar-content {
            display: flex;
            min-height: calc(100vh - 50px);
        }
        .sidebar {
            width: 220px;
            background: #343a40;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background: white;
        }

        /* Testlar Ro'yxati sarlavhasi uchun stil */
        .section-title {
            margin: 10px 0 20px;
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .recipe-table-container {
            overflow-x: auto;
        }

        .recipe-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        .recipe-table th,
        .recipe-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        .recipe-table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .button {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }
        .button.green { background-color: #28a745; color: white; }
        .button.yellow { background-color: #ffc107; color: black; }
        .button.red { background-color: #dc3545; color: white; }
        .button.blue { background-color: #007bff; color: white; }

        @media (max-width: 768px) {
            .recipe-table th, .recipe-table td {
                font-size: 12px;
                padding: 6px;
            }
            .button {
                font-size: 12px;
                padding: 6px 8px;
            }
            .section-title {
                font-size: 20px;
            }
            .sidebar {
                width: 100px;
            }
            .sidebar a {
                font-size: 12px;
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="site-name">Pazanda</div>

    <div class="user-notification">
        <div class="notification" title="Bildirishnomalar">
            <span class="notification-icon">&#128276;</span>
            <span class="notification-badge" id="notificationBadge">0</span>
        </div>

        <img src="{{ asset('/admin/img/user1.webp') }}" alt="User Logo" class="user-logo" />

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="adminDropdown">Admin <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a href="editProfile.html">Edit Profile</a></li>
                <li><a href="{{ route('Auth.logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="sidebar-content">
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.all.posts') }}">Po'stlartlar</a>
        <a href="{{ route('admin.posts.create') }}">Po'st Qo'shish</a>
        <a href="{{ route('admin.all.categories') }}">Categoriyalar</a>
        <a href="{{ route('admin.category.create') }}">Categoriya Qo'shish</a>
        <a href="{{ route('admin.all.tests') }}">Testlar</a>
        <a href="{{ route('admin.create.tests') }}">Test Qo'shish</a>
    </div>

    <div class="content">

        <h2 class="section-title">Testlar Ro'yxati</h2>

        <div class="recipe-table-container">
            <table class="recipe-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomi</th>
                    <th>Tavsif</th>
                    <th>Kategoriya</th>
                    <th>To‘g‘ri Javob</th>
                    <th>Xato Javob 1</th>
                    <th>Xato Javob 2</th>
                    <th>Xato Javob 3</th>
                    <th>Tahrirlash</th>
                    <th>O‘chirish</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->description }}</td>
                        <td>{{ $test->category->category_name ?? '—' }}</td>
                        <td>{{ $test->true_answer }}</td>
                        <td>{{ $test->false_answer1 }}</td>
                        <td>{{ $test->false_answer2 }}</td>
                        <td>{{ $test->false_answer3 }}</td>
                        <td>
                            <a href="{{ route('admin.tests.edit', $test->id) }}" class="button blue">Tahrirlash</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.tests.delete', $test->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button red" onclick="return confirm('Ushbu testni o‘chirishni xohlaysizmi?')">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    // Agar dropdown uchun JS kerak bo'lsa
    // hozir oddiy CSS hover ishlatilmoqda
</script>
</body>
</html>

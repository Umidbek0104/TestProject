@extends('Admin.layouts.main')

@section('admin-content')

    <!-- Testlar Ro'yxati sarlavhasi -->
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

@endsection

@section('styles')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        /* Testlar Ro'yxati sarlavhasi uchun stil */
        .section-title {
            margin: 10px 0;
            text-align: center; /* Markazlashtirish */
            font-size: 24px;
            color: #333;
            z-index: 1;
            position: relative; /* Bu pozitsiyalash uchun kerak */
            padding: 10px 0;
        }

        .recipe-table-container {
            overflow-x: auto;
            margin: 20px;
        }

        .recipe-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 5px;
            overflow: hidden;
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

        /* Button styling */
        .button {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button.green { background-color: #28a745; color: white; }
        .button.yellow { background-color: #ffc107; color: black; }
        .button.red { background-color: #dc3545; color: white; }
        .button.blue { background-color: #007bff; color: white; }

        /* Mobile responsiveness */
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
        }
    </style>
@endsection

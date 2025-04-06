@extends('Admin.layouts.main')
@section('admin-content')

    <div class="recipe-table-container">
        <table class="recipe-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Categoriya Nomi</th>
                <th>Categoriya haqida</th>
                <th>Po'stlar soni</th>
{{--                <th>Testlar soni</th>--}}
                <th>Categoriya Tahrirlash</th>
                <th>Categoriya O'chirish</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_slug }}</td>
                    <td>{{ $category->posts_count }}</td>
{{--                    <td>{{ $category->posts_count }}</td>--}}

                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="button blue">Tahrirlash</a>
                    </td>
                    <td>

                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button red" onclick="return confirm('Ushbu kategoriyani o‘chirishni xohlaysizmi?')">O‘chirish</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Retseptni tekshirish uchun modal oynasi -->
    <div class="recipe-modal" id="recipeModal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">×</span>
            <h2>Tayyorlanishi</h2>
            <div id="recipeDetails">
                <!-- Retsept tafsilotlari shu yerda ko'rsatiladi -->
            </div>
            <div class="button-container">
                <button class="button green" onclick="approveRecipe()">Tasdiqlash</button>
                <button class="button red" onclick="rejectRecipe()">Rad etish</button>
                <button class="button yellow" onclick="closeModal()">Orqaga</button>
            </div>
        </div>
    </div>

@endsection

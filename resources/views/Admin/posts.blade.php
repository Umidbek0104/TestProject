@extends('Admin.layouts.main')
@section('admin-content')

    <div class="recipe-table-container">
        <table class="recipe-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Retsept Nomi</th>
                <th>Masalliqlar</th>
                <th>Content</th>
                <th>Category</th>
                <th>Rasm</th>
                <th>Tekshirish</th>
                <th>O'chirish</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->category_name }}</td>
                    <td><img src="{{ $post->video_url }}" alt="Osh" class="recipe-img"></td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="button blue">Tahrirlash</a>
                    </td>
                    <td>
                        <!-- O'chirish uchun formani yaratish -->
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button red" onclick="return confirm('Siz ushbu postni o‘chirishni xohlaysizmi?')">O‘chirish</button>
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

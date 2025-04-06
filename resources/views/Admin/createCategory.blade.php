@extends('Admin.layouts.main')

@section('admin-content')

    <!-- Kategoriya Yaratish Formasi -->
    <div class="category-create-form">

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="form-group1">
                <label for="category_name">Kategoriya Nomi (Category Name)</label>
                <input type="text" id="category_name" name="category_name" value="{{ old('category_name') }}" required>
            </div>

            <div class="form-group1">
                <label for="category_slug">Kategoriya Slug</label>
                <input type="text" id="category_slug" name="category_slug" value="{{ old('category_slug') }}" required>
            </div>

            <!-- Tugmalar -->
            <div class="form-group buttons">
                <button type="submit" class="button green">Saqlash</button>
                <button type="reset" class="button yellow">Tozalash</button>
            </div>
        </form>

    </div>

@endsection

@extends('Admin.layouts.main')

@section('admin-content')

    <div class="category-edit-form">

        <h2>Kategoriya Tahrirlash</h2>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- PUT usuli -->

            <div class="form-group1">
                <label for="category_name">Kategoriya Nomi</label>
                <input type="text" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required>
            </div>

            <div class="form-group1">
                <label for="category_slug">Kategoriya Slug</label>
                <input type="text" id="category_slug" name="category_slug" value="{{ old('category_slug', $category->category_slug) }}" required>
            </div>

            <div class="form-group buttons">
                <button type="submit" class="button green">Yangilash</button>
                <a href="{{ route('admin.all.categories') }}" class="button yellow">Orqaga</a>
            </div>
        </form>


    </div>

@endsection

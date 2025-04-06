@extends('Admin.layouts.main')

@section('admin-content')

    <!-- Post Yaratish Formasi -->
    <div class="post-create-form">

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group1">
                <label for="title">Sarlavha (Title)</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group1">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
            </div>

            <div class="form-group1">
                <label for="content">Kontent</label>
                <textarea id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group1">
                <label for="video_url">Video URL (ixtiyoriy)</label>
                <input type="text" id="video_url" name="video_url" value="{{ old('video_url') }}">
            </div>

            <div class="form-group1">
                <label for="category_id">Kategoriya</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Tanlang</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tugmalar -->
            <div class="form-group buttons">
                <button type="submit" class="button green">Saqlash</button>
                <button type="reset" class="button yellow">Tozalash</button>
            </div>
        </form>

    </div>

@endsection

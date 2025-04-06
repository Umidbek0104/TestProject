@extends('Admin.layouts.main')

@section('admin-content')

    <!-- Test Yaratish Formasi -->
    <div class="test-create-form">

        <form action="{{ route('admin.tests.store') }}" method="POST">
            @csrf

            <div class="form-group1">
                <label for="name">Savol (Nomi)</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group1">
                <label for="description">Tavsif (Description)</label>
                <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
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

            <div class="form-group1">
                <label for="correct_answer">To‘g‘ri Javob</label>
                <input type="text" id="correct_answer" name="true_answer" value="{{ old('correct_answer') }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer1">Xato Javob 1</label>
                <input type="text" id="wrong_answer1" name="false_answer1" value="{{ old('wrong_answer1') }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer2">Xato Javob 2</label>
                <input type="text" id="wrong_answer2" name="false_answer2" value="{{ old('wrong_answer2') }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer3">Xato Javob 3</label>
                <input type="text" id="wrong_answer3" name="false_answer3" value="{{ old('wrong_answer3') }}" required>
            </div>

            <!-- Tugmalar -->
            <div class="form-group buttons">
                <button type="submit" class="button green">Saqlash</button>
                <button type="reset" class="button yellow">Tozalash</button>
            </div>
        </form>

    </div>

@endsection

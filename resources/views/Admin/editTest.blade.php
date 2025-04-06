@extends('Admin.layouts.main')

@section('admin-content')

    <!-- Test Tahrirlash Formasi -->
    <div class="test-edit-form">

        <h2>Testni Tahrirlash</h2>

        <form action="{{ route('admin.tests.update', $test->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- PUT methodini ko‘rsatish uchun -->

            <div class="form-group1">
                <label for="name">Savol (Nomi)</label>
                <input type="text" id="name" name="name" value="{{ old('name', $test->name) }}" required>
            </div>

            <div class="form-group1">
                <label for="description">Tavsif (Description)</label>
                <textarea id="description" name="description" rows="4">{{ old('description', $test->description) }}</textarea>
            </div>

            <div class="form-group1">
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

            <div class="form-group1">
                <label for="correct_answer">To‘g‘ri Javob</label>
                <input type="text" id="correct_answer" name="true_answer" value="{{ old('true_answer', $test->true_answer) }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer1">Xato Javob 1</label>
                <input type="text" id="wrong_answer1" name="false_answer1" value="{{ old('false_answer1', $test->false_answer1) }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer2">Xato Javob 2</label>
                <input type="text" id="wrong_answer2" name="false_answer2" value="{{ old('false_answer2', $test->false_answer2) }}" required>
            </div>

            <div class="form-group1">
                <label for="wrong_answer3">Xato Javob 3</label>
                <input type="text" id="wrong_answer3" name="false_answer3" value="{{ old('false_answer3', $test->false_answer3) }}" required>
            </div>

            <!-- Tugmalar -->
            <div class="form-group buttons">
                <button type="submit" class="button green">Yangilash</button>
                <a href="{{ route('admin.all.tests') }}" class="button yellow">Orqaga</a>
            </div>
        </form>

    </div>

@endsection

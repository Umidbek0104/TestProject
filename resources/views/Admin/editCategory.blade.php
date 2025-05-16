<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategoriya Tahrirlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2 bg-light pt-4" style="min-height: 100vh;">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#"><i class="fas fa-home me-2"></i> Bosh sahifa</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link active fw-bold text-primary" href="#"><i class="fas fa-layer-group me-2"></i> Kategoriyalar</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="#"><i class="fas fa-book me-2"></i> Postlar</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="col-md-10 p-4">
            <h3 class="text-primary fw-bold mb-4">
                <i class="fas fa-edit me-2"></i> Kategoriya Tahrirlash
            </h3>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-pen me-2"></i> Ma'lumotlarni o‘zgartirish
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="category_name" class="form-label">Kategoriya Nomi</label>
                            <input type="text" name="category_name" id="category_name" value="{{ old('category_name', $category->category_name) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_slug" class="form-label">Kategoriya Slug</label>
                            <input type="text" name="category_slug" id="category_slug" value="{{ old('category_slug', $category->category_slug) }}" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.all.categories') }}" class="btn btn-warning me-2">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Yangilash
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

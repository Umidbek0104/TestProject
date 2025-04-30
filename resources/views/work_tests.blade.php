<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Hirevac</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- font awesome style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />

    <style>
        /* Navbar ustun ko‘k fon */
        .header_section {
            background-color: rgba(0, 0, 139, 0.9);
            padding: 0;
            position: relative;
            z-index: 100;
        }

        .navbar {
            background-color: rgba(0, 0, 139, 0.9);
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .navbar-brand span {
            color: white;
            font-weight: 600;
            font-size: 24px;
        }

        .nav-link {
            color: white !important;
            padding-left: 15px;
            padding-right: 15px;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .btn-danger.btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }

        .hero_area {
            background: none;
            min-height: auto;
            padding-top: 0;
        }
    </style>
</head>

<body>

<div class="hero_area">
    <!-- Header -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{ route('page.index') }}">
                    <span>Hirevac</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('page.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('page.about') }}">About</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('page.tests') }}">Tests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('page.posts') }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link">Salom, {{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('Auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Auth.loginpage') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Auth.register') }}">Sign Up</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>

<!-- PSIXOLOGIK TEST FORMASI -->
<div class="container py-5">
    <h2 class="mb-4 text-center">Psixologik test</h2>

    @if(session('result'))
        <div class="alert alert-success text-center">
            Sizning natijangiz: <strong>{{ session('result') }}</strong> ta to‘g‘ri javob!
        </div>
    @endif

    <form action="{{ route('tests.submit') }}" method="POST">
        @csrf
        @foreach($tests as $index => $test)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>{{ $index + 1 }}. {{ $test->name }}</strong>
                </div>
                <div class="card-body">
                    <p>{{ $test->description }}</p>

                    @php
                        $answers = [
                            $test->true_answer,
                            $test->false_answer1,
                            $test->false_answer2,
                            $test->false_answer3,
                        ];
                        shuffle($answers);
                    @endphp

                    @foreach($answers as $answer)
                        <div class="form-check">
                            <input type="radio" name="answers[{{ $test->id }}]" value="{{ $answer }}" class="form-check-input" required>
                            <label class="form-check-label">{{ $answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit" class="btn btn-success">Natijani ko‘rish</button>
        </div>
    </form>
</div>

<!-- Info & Footer -->
<footer class="footer_section bg-light py-3">
    <div class="container text-center">
        <p>&copy; <span id="displayYear"></span> Yaratuvchi <a href="#">Sadulayev Omonboy</a></p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script>
    document.getElementById("displayYear").textContent = new Date().getFullYear();
</script>

</body>
</html>

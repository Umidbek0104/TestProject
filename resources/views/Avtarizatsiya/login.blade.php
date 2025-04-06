<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
</head>
<body>
<div class="login-container">
    <div class="login-form">
        <h2>Admin Login</h2>
        <form method="POST" action="{{ route('Auth.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>



            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>

{{--            @if (Route::has('password.request'))--}}
                <div class="forgot-password">
                    <a href="{{ route('Auth.register') }}">Ro'yhatdan o'tish</a>
                </div>
{{--            @endif--}}
        </form>
    </div>
</div>
</body>
</html>

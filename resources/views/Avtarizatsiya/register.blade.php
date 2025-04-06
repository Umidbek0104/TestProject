<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin Panel</title>
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
</head>
<body>
<div class="register-container">
    <div class="register-form">
        <h2>Admin Register</h2>
        <form method="POST" action="{{ route('Auth.register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>





            <div class="form-group">
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

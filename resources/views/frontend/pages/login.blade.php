<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Propdukan | Admin-Login</title>
  <link rel="stylesheet" href="{{ url('/') }}/frontend/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> meta.codes - Animated Login and Registration Form </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">/
        {{-- Registration --}}
        <div class="form-wrapper sign-up">
            <form action="{{ route('register')}}" method="post">
                @csrf
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="name" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="input-group">
                    <input type="number" name="mobile_number" required>
                    <label for="">Mobile No.</label>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="#" class="signIn-link">Sign In</a></p>
                </div>
            </form>
        </div>

        {{-- Login page --}}
        <div class="form-wrapper sign-in">
            <form action="{{ route('admin-login') }}" method="post">
                @csrf
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="email" required>
                    <label for="">Username or Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="#" class="signUp-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ url('/') }}/frontend/script.js"></script>
</body>

</html>
<!-- partial -->
  <script  src="{{ url('/') }}/frontend/script.js"></script>

</body>
</html>

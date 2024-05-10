<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ===( CODE AASHU )=== -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | {{ config('APP_NAME') }}</title>
    <!-- === Custom CSS === -->
    <link rel="stylesheet" href="assets/login/css/style.css" />
</head>

<body>
    <section>
        <div class="login-box">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon> </span>
                    <input type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus>
                    <label> Email</label>
                </div>
                <div class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon> </span>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror">
                    <label> Password</label>
                </div>
                <div class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="remember-forget">
                    <label>
                        <!-- <input type="checkbox">Remember Me -->
                    </label>
                    <a href="#">Forget Password</a>
                </div>
                <button type="Submit">Login</button>
                <div class="register-link">
                    <p>Don't have an account?
                        <a href="#">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
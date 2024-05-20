<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ ('/assets/login/style.css') }}">
    <title>Login | {{ config('app.name') }}</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="/login/google" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="/login/facebook" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="/login/github" class="icon"><i class="fa-brands fa-github"></i></a>
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your email for registration</span>
                <form action="{{ route('registeruser') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Name" name="name">
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <input hidden type="text" name="is_admin" value="false">
                    <button type="submit">Sign Up</button>
                </form>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1 style="margin: 5px;">Log In</h1>
                <div class="social-icons">
                    <a href="/login/google" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="/login/facebook" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="/login/github" class="icon"><i class="fa-brands fa-github"></i></a>
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your email password</span>
                <input type="email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus placeholder="Email">
                <div class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <input type="password" id="passwordKu" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
                <div class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <!-- <input type="checkbox" onclick="showHide()"> Tampilkan Password -->
                <a href="#" class="col-form-label col-sm-2 pt-0" onclick="showHide()"> <i class="fa fa-eye"></i>
                    Tampilkan Password</a>
                <button type="submit" class="btn btn-primary btn-lg" id="load2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading...">Sign In</button>
                <a href="#">Forget Your Password?</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{('/assets/login/script.js')}}"></script>
    <script>
        function showHide() {
            var inputan = document.getElementById("passwordKu");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-member.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-content d-flex justify-content-center align-items-center py-4">
        {{-- LOGIN FORM --}}
        <div class="login-form shadow-lg">
            <h1 class="text-center">CAMSHOP</h1>
            @if (isset($needLogin))
                <div class="text-center"><p>You should login first to access this feature</p></div>
            @endif
            @if (isset($wrongPassword))
                <div class="text-center"><p>Password incorrect, please try again.</p></div>
            @endif
            <div class="login-input d-flex justify-content-center mt-2">
                <div class="input-form">
                    <form action="/login-proses" method="POST">
                        @csrf
                        <div class="mb-3 text-center">
                            <label for="emailInput" class="form-label">Email Address</label>
                            <input name="email" type="email" class="form-control focus-ring focus-ring-light rounded-0" id="emailInput" placeholder="Example: name@example.com" value="{{ old('email') }}">
                        </div>

                        @error('email')
                             <p class="text-danger">! {{ $message }}</p>
                        @enderror

                        <div class="mb-3 text-center">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control focus-ring focus-ring-light rounded-0" id="usernameInput" placeholder="Example: John Doe" value="{{ old('username') }}">
                            
                        </div>

                        @error('username')
                             <p class="text-danger">! {{ $message }}</p>
                        @enderror

                        <div class="mb-3 text-center">
                            <label for="passwordInput" class="form-label">Password</label>
                            <div class="d-flex">
                                <input name="password" type="password" class="form-control focus-ring focus-ring-light rounded-0" id="passwordInput" placeholder="Password">
                                <span class="input-group-text rounded-0" id="addon-wrapping"><i class="bi bi-eye"></i></span>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <div class="mb-3 text-center">
                                <label for="passwordCInput" class="form-label">Password Confirmation</label>
                                <div class="d-flex">
                                    <input name="password_confirmation" type="password" class="form-control focus-ring focus-ring-light rounded-0" id="passwordCInput" placeholder="Password Confirmation">
                                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            @error('password')
                             <p class="text-danger">! {{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="action mb-1 d-flex justify-content-between align-items-center">
                            <a href="/list-product" class="back-link">Back</a>
                            <button name="submit" type="submit" class="submit-button">Submit</button>
                        </div>
                        <div class="registration">
                            <p class="text-center">Dont have account yet? <a href="/registration">Registration here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- LOGIN FORM --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
            document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.querySelector('.bi-eye');

            eyeIcon.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
            });
          });
    </script>

</body>
</html>
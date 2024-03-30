<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member | {{ $memberProfile->username }} </title>
    <link rel="stylesheet" href="{{ asset('css/member-homepage.css') }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="member-homepage p-5">
        {{-- NAVBAR --}}
        <div class="navigation container align-items-center">
            <nav class="navbar navbar-expand-lg bg-body-transparent border-bottom border-2">
                <div class="row collapse navbar-collapse " id="navbarLink">
                    <div class="col-md-4 d-flex justify-content-start">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link" id="webTitle">CAMSHOP</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav justify-content-center ms-auto me-auto">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="/homepage">Homepage</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link"  href="/list-product">Product</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="premiere-product">Premiere</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <ul class="nav">
                            <li class="nav-item">
                                @if (session()->has('isLogin'))
                                    <a href="/logout" class="nav-link">Logout</a>
                                @else
                                    <a href="/login" class="nav-link">Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLink" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        {{-- NAVBAR --}}

        {{-- MEMBER IDENTITY --}}
        <div class="profile w-100 mt-5 container">
            <div class="row">
                <div class="col-md-4">

                    {{-- MEMBER PROFILE --}}
                    <div class="member-profile shadow py-5 px-2 text-center">
                        <div class="profile-heading">
                            <h3>Profile</h3>
                        </div>
                        <div class="profile-picture mb-2">
                            <i style="font-size: " class="bi bi-person-circle"></i>
                        </div>
                        <div class="profile-description">
                            <div class="mb-2">
                                <p class="m-0">Email</p>
                                <p class="m-0">{{ $memberProfile->email }}</p>
                            </div>
                            <div>
                                <p class="m-0">Username</p>
                                <p class="m-0">{{ $memberProfile->username }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- MEMBER PROFILE --}}

                </div>
                <div class="col-md-8">

                    {{-- MEMBER ACTION --}}
                    <div class="crud-navigation border-bottom border-1 d-flex justify-content-center align-items-center w-100">
                        <h3>HISTORY</h3>
                    </div>
                    {{-- MEMBER ACTION --}}

                </div>
            </div>
        </div>
        {{-- member IDENTITY --}}

    </div>
</body>
</html>
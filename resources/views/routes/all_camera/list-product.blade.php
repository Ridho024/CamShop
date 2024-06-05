<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAM SHOP | ALL PRODUCTS</title>
    <link rel="stylesheet" href="{{ asset('css/list-product.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">

</head>
<body>

    <div class="product-list p-5">

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
                              <a class="nav-link" href="/homepage">Homepage</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="/list-product">Product</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/premiere-product">Premiere</a>
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

        {{-- SEARCH PRODUCT --}}
        <div class="search-product container my-3">
            <form class="d-flex search-input" role="search" method="GET" action="/list-product">
                <input name="search" class="form-control me-2 focus-ring focus-ring-light rounded-0" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit">Search</button>
            </form>
        </div>
        {{-- SEARCH PRODUCT --}}

        {{-- LIST PRODUCT --}}
        <div class="listproduct">
            <div class="list-camera row justify-content-center">
                <div class="card-group row justify-content-center">
                    @foreach ($allProduct as $index => $item)
                            @if ($index % 3 == 0)
                                <div class="row mt-4">
                            @endif
                            <div class="card rounded-0 col-md-4 p-0">
                                <img src="{{ asset('product_image/' . $item->foto_camera) }}" class="card-img-top rounded-0" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->camera_name }}</h5>
                                    <p class="camera-spesification card-text">
                                        {{ $item->camera_spesification }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="product-price">
                                            Rp. {{ $item->camera_price }}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="/camera-info/{{ $item->camera_id }}" class="see-more">See more</a>
                                            {{-- <a href="product/{{ $item->IdCamera }}">Beli</a> --}}
                                            @if (session()->has('isLogin') && session()->get('role') == 'Member')
                                                <a class="beli-btn" href="buy-product-form/{{ $item->camera_id }}">Beli</a>
                                            @elseif(session()->has('isLogin') && session()->get('role') == 'Admin')
                                                <a href=""></a>
                                            @else
                                                <a class="beli-btn" href="/login-required">Beli</a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @if (($index + 1) % 3 == 0 || $loop->last)
                                </div>
                            @endif
                    @endforeach
                </div>
                <div class="pagination d-flex justify-content-center my-5">
                    {{ $allProduct->links() }}
                </div>
            </div>
            
        </div>
        {{-- LIST PRODUCT --}}

        {{-- FOOTER --}}
        <div class="footer container d-flex justify-content-center align-items-center">
            <div>
                <h3 class="text-center mb-0">CAMSHOP</h3>
                <p class="text-center mb-0">This website is made by Muhammad Ridho Ramadhan</p>
                <p class="text-center mt-0">Laravel | Bootstrap</p>
            </div>
        </div>
        {{-- FOOTER --}}
    </div>






    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAM SHOP | HOME</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
    {{-- Hero Content --}}
    <div class="hero-content vh-100 w-100 d-flex justify-content-center align-items-center">
        <div class="hero-text text-center">
            <h1 class="web-title">CAM SHOP</h1>
            <p class="web-desc">Take your best moment with your best camera.</p>
            <div>
                <a href="/list-product" type="button" class="camera-link">Get Camera</a>
            </div>
        </div>
    </div>
    {{-- Hero Content --}}

    {{-- OUR PREMIERE --}}
    <div class="our-premiere w-100 p-5">
        <h2 class="premiere-title text-center">SEE OUR PREMIERE</h2>
        {{-- Premiere Camera --}}

        <div class="premiere-special row">
            <div class="col-md-6">
                <img src="{{ asset('web_image_asset/background.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('web_image_asset/premier2.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="watch-premiere">
            <h2>SEE OUR OTHER PREMIERE</h2>
            <p><a href="/premiere-product" class="premiere-link">Klik here</a></p>
        </div>

        <div class="premiere-common row">
            <div class="col-md-6">
                <img src="{{ asset('web_image_asset/premier3.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('web_image_asset/premiere4.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>

        
        
        {{-- Premiere Camera --}}
    </div>
    {{-- OUR PREMIERE --}}

    {{-- MOST SEARCHED --}}
    <div class="most-searched w-100 py-4 px-5">
        <h2 class="most-searched-title text-center">MOST SEARCHED</h2>

        {{-- MOST SEARCHED CAMERA --}}
        <div class="most-searched-camera row justify-content-center">
            <div class="card-group row justify-content-center">
                @foreach ($mostSearch as $index => $item)
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
                                        @if (session()->has('isLogin'))
                                            <a class="beli-btn" href="/camera/{{ $item->camera_id }}">Beli</a>
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
        </div>
        {{-- MOST SEARCHED CAMERA --}}

    </div>
    {{-- MOST SEARCHED --}}

    {{-- OUR SOSMED --}}
    <div class="our-sosmed mb-4 w-100 px-5 py-5">
        <h2 class="sosmed-title text-center mb-4">FOLLOW US</h2>

        {{-- SOSMED TYPE --}}
        <div class="sosmed-type row">
            <div class="col-md-6 sosmed1 p-4 border-end border-2">
                <h3 class="text-center">CONTACT</h3>
                <form action="">
                    @csrf
                    <div class="contact-input">
                        <div class="mb-3">
                            <label for="fullNameInput">Your name</label>
                            <input type="text" name="fullNameInput" class="form-control" id="fullNameInput" placeholder="Example: John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Your email address</label>
                            <input type="email" name="emailInput" class="form-control" id="emailInput" placeholder="Example: name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="messageInput" class="form-label">Your message</label>
                            <textarea name="messageInput" class="form-control" id="messageInput" rows="3" style="resize: none" placeholder="Example: Your message here"></textarea>
                        </div>
                        <div class="mb-1 d-flex justify-content-between align-items-center">
                            <div>Get your private access to our product</div>
                            <button type="submit" class="send-contact">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 sosmed2">
                <h3 class="text-center m-4">SOCIAL MEDIA</h3>
                <div class="row pb-5">
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/instagram_logo.png') }}"  alt="instagram_logo">
                    </div>
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/facebook_logo.png') }}"  alt="facebook_logo">
                    </div>
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/x_logo.png') }}"  alt="x_logo">
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/patreon_logo.png') }}"  alt="instagram_logo">
                    </div>
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/pinterest_logo.png') }}"  alt="facebook_logo">
                    </div>
                    <div class="col-md-4 col-sm-4 d-flex justify-content-center">
                        <img src="{{ asset('web_image_asset/youtube_logo.png') }}"  alt="x_logo">
                    </div>
                </div>
                
            </div>
        </div>
        {{-- SOSMED TYPE --}}
    </div>
    {{-- OUR SOSMED --}}

    {{-- FOOTER --}}
    <div class="footer w-100 d-flex justify-content-center align-items-center">
        <div>
           <h2 class="text-center">CAMSHOP</h2>
           <p class="text-center">This website is made by Muhammad Ridho Ramadhan</p>
           <p class="text-center mt-0">Laravel | Bootstrap</p>
        </div>
    </div>
    {{-- FOOTER --}}










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
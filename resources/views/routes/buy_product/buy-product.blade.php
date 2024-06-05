<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/buy-product.css') }}">
    <title>Buy Camera | {{ $cameraInfo->camera_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div class="product-content">
        {{-- BUY PRODUCT FORM --}}
        <div class="buy-product-form shadow-lg">
            <h3 class="text-center py-1">Buy Product Form</h3>
            <div class="row p-4">
                <div class="col-md-5">
                    <img src="{{ asset('product_image/' . $cameraInfo->foto_camera) }}" class="img-fluid rounded" alt="{{ $cameraInfo->camera_name }}">
                </div>
                <div class="col-md-7 px-3 input-field">
                    <form action="{{ $cameraInfo->camera_id }}/buy-process" method="GET">
                        @csrf
                        <div class="row form-input">
                            <div class="col-md-12 text">Camera Name</div>
                            <div class="col-md-12 input-detail">
                                <input type="text" class="focus-ring focus-ring-light rounded-50"  name="camera_name" value="{{ $cameraInfo->camera_name }}" disabled >
                            </div>
                        </div>
                        <div class="row form-input">
                            <div class="col-md-12 text">Customer Name</div>
                            <div class="col-md-12 input-detail">
                                <input type="text" class="focus-ring focus-ring-light rounded-50" name="customer_name" value="{{ $userInfo->username }}" disabled >
                            </div>
                        </div>
                        <div class="row form-input">
                            <div class="col-md-12 text">Camera Price (Rp/Unit)</div>
                            <div class="col-md-12 input-detail">
                                <input type="text" class="focus-ring focus-ring-light rounded-50" name="camera_price" value="Rp{{ $cameraInfo->camera_price }}" disabled >
                            </div>
                        </div>
                        <div class="row form-input">
                            <div class="col-md-12 text">Quantity</div>
                            <div class="col-md-12 input-detail">
                                <input type="number" class="focus-ring focus-ring-light rounded-50" min="0" name="quantity" value="1" required>
                            </div>
                        </div>
                        <div class="row form-input">
                            <div class="col-md-12 text">User address</div>
                            <div class="col-md-12 input-detail">
                                <input type="text" class="focus-ring focus-ring-light rounded-50" name="user_address" placeholder="Jl. Nowhere 3000" required>
                            </div>
                        </div>
                        <div class="row form-input form-action">
                            <div class="col-md-4"><a href="/" class="back-link" id="backToPrevious">Back</a></div>
                            <div class="col-md-8"><button type="submit" class="confirm-btn">Buy Product</button></div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
        {{-- BUY PRODUCT FORM --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('backToPrevious').addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan aksi default dari hyperlink
            history.back(); // Kembali ke halaman sebelumnya
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/camera-info.css') }}">
    <title>Camera Info | {{ $cameraInfo->camera_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div class="product-content">
        {{-- PRODUCT INFO --}}
        <div class="product-info container shadow-lg">
            <div class="product-detail row p-4">
                <div class="col-lg-4 camera-image">
                    <img src="{{ asset('product_image/' . $cameraInfo->foto_camera) }}" class="img-fluid" alt="{{ $cameraInfo->camera_name }}">
                </div>
                <div class="col-lg-8 camera-description">
                    <h3 class="page-title">Camera Details</h3>
                    <div class="camera-name row ">
                        <div class="col-md-2 d-flex justify-content-between pe-0"><span>Name</span><span>:</span></div>
                        <div class="col-md-10"><p>{{ $cameraInfo->camera_name }}</p></div>
                    </div>
                    <div class="camera-spesification row">
                        <div class="col-md-2 d-flex justify-content-between pe-0""><span>Spesification</span><span>:</span></div>
                        <div class="col-md-10"><p>{{ $cameraInfo->camera_spesification }}</p></div>
                        
                    </div>
                    <div class="camera-price row">
                        <div class="col-md-2 d-flex justify-content-between pe-0""><span>Price</span><span>:</span></div>
                        <div class="col-md-10"><p>Rp. {{ $cameraInfo->camera_price }}</p></div>
                    </div>
                    <div class="product-action d-flex justify-content-between">
                        <div>
                            <a href="/" class="back-button" id="backToPrevious">Back</a>
                        </div>
                        <div><a href="/" class="buy-button">Beli</a></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- PRODUCT INFO --}}
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
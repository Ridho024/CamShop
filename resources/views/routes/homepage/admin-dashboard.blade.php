<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Lato:wght@100;300;400;700;900&family=Noto+Sans+Vithkuqi:wght@500&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="admin-dashboard p-5">

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

        {{-- ADMIN IDENTITY --}}
        <div class="profile w-100 mt-5 container">
            <div class="row">
                <div class="col-md-4">

                    {{-- ADMIN PROFILE --}}
                    <div class="admin-profile shadow py-5 px-2 text-center">
                        <div class="profile-heading">
                            <h3>Profile</h3>
                        </div>
                        <div class="profile-picture mb-2">
                            <i style="font-size: " class="bi bi-person-circle"></i>
                        </div>
                        <div class="profile-description">
                            <div class="mb-2">
                                <p class="m-0">Email</p>
                                <p class="m-0">{{ $adminProfile->email }}</p>
                            </div>
                            <div>
                                <p class="m-0">Username</p>
                                <p class="m-0">{{ $adminProfile->username }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- ADMIN PROFILE --}}

                </div>
                <div class="col-md-8">

                    {{-- ADMIN ACTION --}}
                    <div class="crud-navigation border-bottom border-1 d-flex justify-content-center align-items-center w-100">
                        <div class="d-flex">
                            <h3>PRODUCTS INVOICE</h3>
                        </div>
                    </div>
                    <div class="products-invoice pt-4">
                        @foreach($productsInvoice as $invoice => $item)
                            <div class="row camera-invoice mb-4 py-2 shadow">
                                <div class="col-md-3 camera-image d-flex">
                                    <img src="{{ asset('product_image/' . $item->camera_foto) }}" class="card-img-top rounded-25" alt="Image Foto">
                                </div>
                                <div class="col-md-6 camera-detail">
                                    <div class="row">
                                        <div class="col-sm-4 px-0 d-flex justify-content-between"><span>Name Camera</span><span>:</span></div>
                                        <div class="col-sm-8">{{ $item->camera_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 px-0 d-flex justify-content-between"><span>Quantity</span><span>:</span></div>
                                        <div class="col-sm-8">{{ $item->quantity }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 px-0 d-flex justify-content-between"><span>Total Price</span><span>:</span></div>
                                        <div class="col-sm-8">Rp{{ number_format($item->total_price, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 px-0 d-flex justify-content-between"><span>Status</span><span>:</span></div>
                                        <div class="col-sm-8">
                                            @if ($item->status == 'Pending')
                                                <span>The invoice has'nt been accepted yet.</span>
                                            @elseif($item->status == 'Accepted')
                                                <span>You have accepted this invoice.</span>
                                            @elseif($item->status == 'Already Paid')
                                                <span>The customer has paid the bill, please send the camera.</span>
                                            @elseif($item->status == 'Sending')
                                                <span>Product is seending to customer address.</span>
                                            @elseif($item->status == 'Canceled')
                                                <span>The customer has canceled the invoice.</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 invoice-action px-2 d-flex jutify-content-center align-items-center">
                                    <div class="admin-btn">
                                        @if ($item->status == 'Pending')
                                            <a href="product-invoice/admin/accept/{{ $item->no }}" id="accept-btn">Accept</a>
                                            <a href="product-invoice/admin/reject/{{ $item->no }}" id="reject-btn">Reject</a>
                                        @elseif($item->status == 'Accepted')
                                            <a href="product-invoice/admin/reject/{{ $item->no }}" id="cancel-btn">Cancel</a>
                                        @elseif($item->status == 'Already Paid')
                                            <a href="product-invoice/admin/send/{{ $item->no }}" id="send-btn">Send Camera</a>
                                        @elseif($item->status == 'Sending')
                                            <a>Product Sended</a> 
                                        @elseif($item->status == 'Canceled Accept')
                                            <a href="product-invoice/admin/accept/{{ $item->no }}" id="accept-btn">Accept</a>
                                            <a href="product-invoice/admin/reject/{{ $item->no }}" id="reject-btn">Reject</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- ADMIN ACTION --}}

                </div>
            </div>
        </div>
        {{-- ADMIN IDENTITY --}}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
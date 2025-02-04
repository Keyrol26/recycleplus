{{-- @extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Client Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>

                    <div class="card-body">
                        {{ __('Pickup Booking Form!') }}
                        <form method="POST" action="{{ route('storebooking') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label for="phoneno"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone No.') }}</label>

                                <div class="col-md-6">
                                    <input id="phoneno" type="tel"
                                        class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"
                                        value="{{ old('phoneno') }}" required autocomplete="phoneno" autofocus>

                                    @error('phoneno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control" placeholder="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit Form') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>RecyclePlus | {{ ucfirst(Route::currentRouteName()) }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images-bg/3.svg') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../landing-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../landing-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../landing-assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../landing-assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../landing-assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../landing-assets/css/main.css" rel="stylesheet">
    <script src='https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js'></script>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                @include('layouts.logo')
                <h1 class="sitename">RecyclePlus</h1>
                <span>.</span>
            </a>
            @if (Route::is('home'))
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home<br></a></li>
                        <li><a href="#about">Learn</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#bookingform">Booking Form</a></li>
                        <li><a href="#contact">Recycle Center</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            @else
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home') }}#hero">Home<br></a></li>
                        <li><a href="{{ route('home') }}#about">Learn</a></li>
                        <li><a href="{{ route('home') }}#services">Services</a></li>
                        <li><a href="{{ route('home') }}#bookingform">Booking Form</a></li>
                        <li><a href="{{ route('home') }}#contact">Recycle Center</a></li>
                        @if (Route::is('history'))
                            <li><a href="{{ route('history') }}" class="active">History</a></li>
                        @else
                            <li><a href="{{ route('history') }}">History</a></li>
                        @endif
                        @if (Route::is('profile'))
                            <li><a href="{{ route('profile') }}" class="active">Profile</a></li>
                        @else
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                        @endif
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            @endif
            <a class="btn-getstarted" data-bs-toggle="dropdown" role="button">
                {{ explode(' ', Auth::user()->name)[0] }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
    </header>


    @yield('content')

    <footer id="footer" class="footer dark-background">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">RecyclePlus</span>
                        </a>
                        <div class="footer-contact pt-3">
                            {{-- <p>A108 Adam Street</p>
                            <p>New York, NY 535022</p> --}}
                            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                            <p><strong>Email:</strong> <span>info@rplus.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#hero" class="active">Home<br></a></li>
                            <li><a href="#about">Learn</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#bookingform">Booking Form</a></li>
                            <li><a href="{{ route('history') }}">History</a></li>
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                        </ul>
                    </div>

                    {{-- <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Product Management</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Graphic Design</a></li>
                        </ul>
                    </div> --}}

                    {{-- <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Hic solutasetp</h4>
                        <ul>
                            <li><a href="#">Molestiae accusamus iure</a></li>
                            <li><a href="#">Excepturi dignissimos</a></li>
                            <li><a href="#">Suscipit distinctio</a></li>
                            <li><a href="#">Dilecta</a></li>
                            <li><a href="#">Sit quas consectetur</a></li>
                        </ul>
                    </div> --}}

                    {{-- <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum</h4>
                        <ul>
                            <li><a href="#">Ipsam</a></li>
                            <li><a href="#">Laudantium dolorum</a></li>
                            <li><a href="#">Dinera</a></li>
                            <li><a href="#">Trodelas</a></li>
                            <li><a href="#">Flexo</a></li>
                        </ul>
                    </div> --}}

                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>RecyclePlus</span></strong>. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../landing-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../landing-assets/vendor/php-email-form/validate.js"></script>
    <script src="../landing-assets/vendor/aos/aos.js"></script>
    <script src="../landing-assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../landing-assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../landing-assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../landing-assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="../landing-assets/js/main.js"></script>

</body>

</html>

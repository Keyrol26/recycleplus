<style>
    .loader-image {
        width: 60px;
        aspect-ratio: 1;
        background: linear-gradient(#f77825 0 0), linear-gradient(#f77825 0 0),
            linear-gradient(#f77825 0 0), linear-gradient(#f77825 0 0),
            linear-gradient(#60b99a 0 0), linear-gradient(#60b99a 0 0),
            linear-gradient(#554236 0 0), linear-gradient(#554236 0 0);
        background-size: 25% 25%, 25% 25%, 25% 25%, 25% 25%, 25% 50%, 25% 50%,
            50% 25%, 50% 25%;
        background-repeat: no-repeat;
        animation: l20 1.5s infinite alternate;
    }

    @keyframes l20 {

        0%,
        10% {
            background-position: calc(1 * 100% / 3) calc(1 * 100% / 3),
                calc(2 * 100% / 3) calc(1 * 100% / 3),
                calc(1 * 100% / 3) calc(2 * 100% / 3),
                calc(2 * 100% / 3) calc(2 * 100% / 3), calc(1 * 100% / 3) 50%,
                calc(2 * 100% / 3) 50%, 50% calc(1 * 100% / 3),
                50% calc(2 * 100% / 3);
        }

        33% {
            background-position: calc(0 * 100% / 3) calc(0 * 100% / 3),
                calc(3 * 100% / 3) calc(0 * 100% / 3),
                calc(0 * 100% / 3) calc(3 * 100% / 3),
                calc(3 * 100% / 3) calc(3 * 100% / 3), calc(1 * 100% / 3) 50%,
                calc(2 * 100% / 3) 50%, 50% calc(1 * 100% / 3),
                50% calc(2 * 100% / 3);
        }

        66% {
            background-position: calc(0 * 100% / 3) calc(0 * 100% / 3),
                calc(3 * 100% / 3) calc(0 * 100% / 3),
                calc(0 * 100% / 3) calc(3 * 100% / 3),
                calc(3 * 100% / 3) calc(3 * 100% / 3), calc(0 * 100% / 3) 50%,
                calc(3 * 100% / 3) 50%, 50% calc(1 * 100% / 3),
                50% calc(2 * 100% / 3);
        }

        90%,
        100% {
            background-position: calc(0 * 100% / 3) calc(0 * 100% / 3),
                calc(3 * 100% / 3) calc(0 * 100% / 3),
                calc(0 * 100% / 3) calc(3 * 100% / 3),
                calc(3 * 100% / 3) calc(3 * 100% / 3), calc(0 * 100% / 3) 50%,
                calc(3 * 100% / 3) 50%, 50% calc(0 * 100% / 3),
                50% calc(3 * 100% / 3);
        }
    }
</style>
<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('home') }}" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->
            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    @include('layouts.logo')
                </div>
                <div class="logo-mini">
                    @include('layouts.logo')
                </div>
            </div>
            <!--logo End-->
            <h4 class="logo-title">RecyclePlus</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/home', 'superadmin/home', 'collector/home') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('home') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-20">
                                <path opacity="0.4"
                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Pages</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                @if (Auth::user()->role == '1')
                    @include('admin.sidebar')
                @endif
                @if (Auth::user()->role == '3')
                    @include('collector.sidebar')
                @endif
                @if (Auth::user()->role == '0')
                    @include('superadmin.sidebar')
                @endif
            </ul>

            @if (Auth::user()->role == '1' || Auth::user()->role == '0')
                <div class="aside-footer flex-column-auto pt-5 pb-7 px-5">
                    <button class="btn btn-primary btn-sm w-100" id="validateImagesBtn">
                        Validate Images
                    </button>
                </div>
            @endif
            <!-- Sidebar Menu End -->
        </div>
    </div>


    {{-- <!-- Modal for Loading Animation -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog d-flex justify-content-center align-items-center modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="loader-image"></div>
                    <p class="mt-3">Validating Images...</p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal for Loading Animation -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <div class="loader-image"></div>
                    <p class="mt-3 text-center">Validating Images...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('validateImagesBtn').addEventListener('click', function() {
            // Show the loading modal when the button is clicked
            $('#loadingModal').modal('show');

            // Redirect or perform the validation task after a slight delay (simulate process)
            setTimeout(function() {
                // Perform the validation task or redirect
                window.location.href = '{{ route('validateAllImages') }}';
            }, 2000); // 2 seconds delay (you can adjust this based on the actual task)
        });
    </script>
</aside>

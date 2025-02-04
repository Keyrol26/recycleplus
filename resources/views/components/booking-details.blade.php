@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Booking Details</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Booking Details!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
    @if ($data->status != 'Processing')
        <button type="button" class="btn btn-outline-light  ms-auto" data-bs-toggle="modal" data-bs-target="#modalstatus">
            Update
            <span class="btn-inner">
                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24"
                    stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </span>
        </button>
    @endif
@endsection
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="profile-content tab-content">
                        <div id="profile-feed" class="tab-pane fade active show">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between pb-4">
                                    <div class="header-title">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img me-3">
                                                <img class="rounded-pill img-fluid avatar-60 bg-soft-danger p-1 ps-2"
                                                    src="../../assets/images/avatars/02.png" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h5 class="mb-0">Booking Details | {{ $data->pickup_id }}</h5>
                                                @if ($data->pickup_status != null)
                                                    @if ($data->pickup_status == 'OnTheWay')
                                                        <p class="mb-0 text-info">
                                                            {{ $data->pickup_status }}
                                                        </p>
                                                    @elseif ($data->pickup_status == 'Collected')
                                                        <p class="mb-0 text-success">
                                                            {{ $data->pickup_status }}
                                                        </p>
                                                    @endif
                                                @else
                                                    @if ($data->status == 'Processing')
                                                        <p class="mb-0 text-info">
                                                            {{ $data->status }}
                                                        </p>
                                                    @elseif ($data->status == 'Accepted')
                                                        <p class="mb-0 text-success">
                                                            {{ $data->status }}
                                                        </p>
                                                    @elseif ($data->status == 'Rejected')
                                                        <p class="mb-0 text-danger">
                                                            {{ $data->status }}
                                                        </p>
                                                    @elseif ($data->status == 'Pending')
                                                        <p class="mb-0 text-warning">
                                                            {{ $data->status }}
                                                        </p>
                                                    @elseif ($data->status == 'Completed')
                                                        <p class="mb-0 text-primary">
                                                            {{ $data->status }}
                                                        </p>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="comment-area p-3">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor,
                                            ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra.
                                            Proin blandit ac massa sed rhoncus</p>
                                        <hr> --}}
                                        <ul class="list-inline p-0 m-0">
                                            <li class="mb-2">
                                                <div class="d-flex">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Waste Categories</h6>
                                                        @php
                                                            // Building category list
                                                            $categories = [];
                                                            if ($data->category->paper) {
                                                                $categories[] = 'Paper';
                                                            }
                                                            if ($data->category->plastic) {
                                                                $categories[] = 'Plastic';
                                                            }
                                                            if ($data->category->electronic) {
                                                                $categories[] = 'Electronic';
                                                            }
                                                            if ($data->category->aluminium) {
                                                                $categories[] = 'Aluminium';
                                                            }
                                                            if ($data->category->steel) {
                                                                $categories[] = 'Steel';
                                                            }
                                                            if ($data->category->cardboard) {
                                                                $categories[] = 'Cardboard';
                                                            }
                                                            if ($data->category->textiles) {
                                                                $categories[] = 'Textiles';
                                                            }
                                                            if ($data->category->metal) {
                                                                $categories[] = 'Metal';
                                                            }
                                                            if ($data->category->glass) {
                                                                $categories[] = 'Glass';
                                                            }
                                                            $displayCategories = $categories;
                                                        @endphp
                                                        <p class="mb-1">{{ implode(', ', $displayCategories) }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-2">
                                                <div class="d-flex">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Estimated Weight</h6>
                                                        <p class="mb-1">{{ $data->est_weight }} KG</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-2">
                                                <div class="d-flex">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Additional Note</h6>
                                                        <p class="mb-1">{{ $data->note ?? 'No Information' }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-2">
                                                <div class="d-flex">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Alternate Contact No</h6>
                                                        <p class="mb-1">{{ $data->alt_phoneno ?? 'No Information' }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-8">
                    <div class="profile-content tab-content">
                        <div id="profile-feed" class="tab-pane fade active show">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between pb-4">
                                    <div class="header-title">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-info mt-2">
                                                <h4 class="mb-0">Booking Details</h4>
                                                <br>
                                                <h5 class="mb-0">Pickup ID: {{ $data->pickup_id }}</h5>
                                                <hr>
                                                <h5>
                                                    @if ($data->status == 'Processing')
                                                        <div class="text-info">
                                                            {{ $data->status }}
                                                        </div>
                                                    @elseif ($data->status == 'Accepted')
                                                        <div class="text-success">
                                                            {{ $data->status }}
                                                        </div>
                                                    @elseif ($data->status == 'Rejected')
                                                        <div class="text-danger">
                                                            {{ $data->status }}
                                                        </div>
                                                    @elseif ($data->status == 'Pending')
                                                        <div class="text-warning">
                                                            {{ $data->status }}
                                                        </div>
                                                    @elseif ($data->status == 'Completed')
                                                        <div class="text-primary">
                                                            {{ $data->status }}
                                                        </div>
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="comment-area p-3">
                                        @php
                                            // Building category list
                                            $categories = [];
                                            if ($data->category->paper) {
                                                $categories[] = 'Paper';
                                            }
                                            if ($data->category->plastic) {
                                                $categories[] = 'Plastic';
                                            }
                                            if ($data->category->electronic) {
                                                $categories[] = 'Electronic';
                                            }
                                            if ($data->category->aluminium) {
                                                $categories[] = 'Aluminium';
                                            }
                                            if ($data->category->steel) {
                                                $categories[] = 'Steel';
                                            }
                                            if ($data->category->cardboard) {
                                                $categories[] = 'Cardboard';
                                            }
                                            if ($data->category->textiles) {
                                                $categories[] = 'Textiles';
                                            }
                                            if ($data->category->metal) {
                                                $categories[] = 'Metal';
                                            }
                                            $displayCategories = $categories;
                                        @endphp
                                        <h5>Waste Details.</h5>
                                        <p>{{ implode(', ', $displayCategories) }}</p>
                                        <h6>Est. Weight : {{ $data->est_weight }} KG</h6>
                                        <hr>
                                        <h6>Additional Note : {{ $data->note ?? 'Not Stated' }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Client Details</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <p>Lorem ipsum dolor sit amet, contur adipiscing elit.</p> --}}
                            <div class="mb-1">Name: <a class="ms-3">{{ $data->name }}</a></div>
                            <div class="mb-1">Phone: <a class="ms-3">{{ $data->phoneno }}</a></div>
                            <div class="mb-1">Gender: <a
                                    class="ms-3">{{ $data->client->user->userprofile->gender }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Pickup Date & Time</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-1">Date: <a
                                    class="ms-3">{{ \Carbon\Carbon::parse($data->pickup_date)->format('M j, Y') }}</a>
                            </div>
                            {{-- <div class="mb-1">Time: <a class="ms-3">{{ $data->pickup_time }}</a></div> --}}
                            <div class="mb-1">Time: <a class="ms-3">{{ \Carbon\Carbon::parse($data->pickup_time)->format('h:i A') }}</a></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Waste Images</h4>
                            </div>
                            @if ($data->image->validation_status != null)
                                <div class="dropdown position-absolute " style="top: 10px; right: 10px;">
                                    <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                        aria-expanded="false" role="button">...
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalvalidate"
                                            class="dropdown-item">Change
                                            Validation</button>
                                    </div>
                                </div>
                            @endif
                            @if ($data->image->validation_status == null)
                                <form method="post" name="submit" class="form"
                                    action="{{ route('wastevalidate', $data->image->id) }}">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-primary btn-sm" id="singleValidateBtn">
                                        Click to Validate!
                                    </button>
                                </form>
                            @else
                                <div class="header-title">
                                    @if ($data->image->validation_status == 'Invalid')
                                        <h5 class="mb-0 text-danger">{{ $data->image->validation_status }}</h5>
                                    @elseif ($data->image->validation_status == 'Valid')
                                        <h5 class="mb-0 text-success">{{ $data->image->validation_status }}</h5>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-card">
                                <a data-fslightbox="gallery" href=" {{ Storage::url($data->image->recycle_image) }}"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <img src=" {{ Storage::url($data->image->recycle_image) }}"
                                        class="img-fluid bg-soft-info rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (is_null($data->collector_id))
                        <div class="card">
                            <div class="card-body">
                                <div class="border-bottom text-center pb-3">
                                    <img src="../../assets/images/avatars/01.png" alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar-80 mb-4">
                                    <p>Collector still not assign for this booking!</p>
                                    <hr>
                                    @if ($data->status == 'Processing' || $data->status == 'Rejected' || $data->status == 'Pending')
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalcollector"
                                            class="btn btn-info mb-2"disabled>Assign Collector</button>
                                    @else
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalcollector"
                                            class="btn btn-info mb-2">Assign Collector</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <!-- Dropdown button at the top-left -->
                                @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                    <div class="dropdown position-absolute " style="top: 10px; right: 10px;">
                                        <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                            aria-expanded="false" role="button">...
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton7">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalcollector" class="dropdown-item">Change
                                                Collector</button>
                                            <form method="post" name="submit" class="form"
                                                action="{{ route('admin.unsignedcollector', $data->id) }}">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="dropdown-item">Unsigned Collector</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <div class="d-flex align-items-center justify-content-center">
                                    <div
                                        class="d-flex flex-column text-center align-items-center justify-content-between ">
                                        <div class="fs-italic">
                                            <h5> {{ $data->collector->user->name }}</h5>
                                            <div class="text-muted-50 mb-1">
                                                <small>Collector Assigned</small>
                                            </div>
                                        </div>
                                        <div class="card-profile-progress">
                                            <div id="circle-progress-1"
                                                class="circle-progress  circle-progress-basic circle-progress-primary"
                                                data-min-value="0" data-max-value="100" data-value="100"
                                                data-type="percent">
                                            </div>
                                            <img src="../../assets/images/avatars/01.png" alt="User-Profile"
                                                class="theme-color-default-img img-fluid rounded-circle card-img">
                                        </div>
                                        <div class="d-flex icon-pill">
                                            <a class="btn btn-sm rounded-pill px-2 py-2 ms-2"
                                                href="tel:{{ $data->collector->user->userprofile->phoneno }}">
                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                {{ $data->collector->user->userprofile->phoneno }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Location Pin</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <iframe class="w-100" src="{{ $mapUrl }}" height="560"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Loading Animation -->
    <div class="modal fade" id="loadingModalSingle" tabindex="-1" aria-labelledby="loadingModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <div class="loader-image"></div>
                    <p class="mt-3 text-center">Validating Image...</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('singleValidateBtn').addEventListener('click', function(event) {
            // Show the loading modal when the button is clicked
            $('#loadingModalSingle').modal('show');

            // Optionally delay form submission if needed
            setTimeout(function() {
                document.forms['submit'].submit(); // Submit the form programmatically
            }, 500); // Optional delay (0.5 seconds in this case)
        });
    </script>

    @include('components.modal-booking-details')
@endsection

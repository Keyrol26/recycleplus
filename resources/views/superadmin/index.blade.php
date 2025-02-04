@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Dashboard</title>
@endsection
@section('nav-head')
    <div>
        <h1>Hello {{ Auth::user()->name }}!</h1>
        <p>We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection

@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row row-cols-1">
                    <div class="overflow-hidden d-slider1 ">
                        <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($total) ? ($total * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-01"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total</p>
                                            <h4 class="counter">{{ $total }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($inprocess) ? ($inprocess * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-02"
                                            class="text-center circle-progress-01 circle-progress circle-progress-info"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">In-Process</p>
                                            <h4 class="counter">{{ $inprocess }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($pending) ? ($pending * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-03"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Pending</p>
                                            <h4 class="counter">{{ $pending }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($accepted) ? ($accepted * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-04"
                                            class="text-center circle-progress-01 circle-progress circle-progress-info"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Accepted</p>
                                            <h4 class="counter">{{ $accepted }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($rejected) ? ($rejected * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-05"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100" data-value={{ $rejected }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Reject</p>
                                            <h4 class="counter">{{ $rejected }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($otw) ? ($otw * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-06"
                                            class="text-center circle-progress-01 circle-progress circle-progress-info"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">OnTheWay</p>
                                            <h4 class="counter">{{ $otw }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        @php
                                            $value = isset($collected) ? ($collected * 100) / 100 : 0;
                                        @endphp
                                        <div id="circle-progress-07"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100" data-value={{ $value }}
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24 " width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Collected</p>
                                            <h4 class="counter">{{ $collected }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card  ">
                            <div class="card-body">
                                <div id="calendar" class="calendar-s"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="mb-2 card-title">Latest Booking</h4>
                                    <p class="mb-0">
                                        <svg class ="me-2 text-primary icon-24" width="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                                        </svg>
                                        {{ $monthly }} new booking this month
                                    </p>
                                </div>
                            </div>
                            <div class="p-0 card-body">
                                <div class="mt-4 table-responsive">
                                    <table id="basic-table" class="table mb-0 table-striped" role="grid">
                                        <thead>
                                            <tr>
                                                <th>WASTE ITEM</th>
                                                <th>ID</th>
                                                <th>STATUS</th>
                                                <th>VIEW</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newbooking as $row)
                                                @php
                                                    // Building category list
                                                    $categories = [];
                                                    if ($row->category->paper) {
                                                        $categories[] = 'Paper';
                                                    }
                                                    if ($row->category->plastic) {
                                                        $categories[] = 'Plastic';
                                                    }
                                                    if ($row->category->electronic) {
                                                        $categories[] = 'Electronic';
                                                    }
                                                    if ($row->category->aluminium) {
                                                        $categories[] = 'Aluminium';
                                                    }
                                                    if ($row->category->steel) {
                                                        $categories[] = 'Steel';
                                                    }
                                                    if ($row->category->cardboard) {
                                                        $categories[] = 'Cardboard';
                                                    }
                                                    if ($row->category->textiles) {
                                                        $categories[] = 'Textiles';
                                                    }
                                                    if ($row->category->metal) {
                                                        $categories[] = 'Metal';
                                                    }
                                                    if ($row->category->glass) {
                                                        $categories[] = 'Glass';
                                                    }
                                                    $displayCategories = $categories;
                                                    // Limit to max 3 categories and add ellipsis if there are more
                                                    if (count($categories) > 3) {
                                                        $displayCategories = array_slice($categories, 0, 3);
                                                        $displayCategories[] = '..'; // add ellipsis at the end
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3"
                                                                src=" {{ Storage::url($row->image->recycle_image) }}"
                                                                alt="profile">
                                                            <h6>{{ implode(', ', $displayCategories) }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $row->pickup_id }}</h6>
                                                    </td>

                                                    @if ($row->pickup_status != null)
                                                        <td>
                                                            @if ($row->pickup_status == 'OnTheWay')
                                                                <div class="text-info">
                                                                    {{ $row->pickup_status }}
                                                                </div>
                                                            @elseif ($row->pickup_status == 'Collected')
                                                                <div class="text-success">
                                                                    {{ $row->pickup_status }}
                                                                </div>
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td>
                                                            @if ($row->status == 'Processing')
                                                                <div class="text-info">
                                                                    {{ $row->status }}
                                                                </div>
                                                            @elseif ($row->status == 'Accepted')
                                                                <div class="text-success">
                                                                    {{ $row->status }}
                                                                </div>
                                                            @elseif ($row->status == 'Rejected')
                                                                <div class="text-danger">
                                                                    {{ $row->status }}
                                                                </div>
                                                            @elseif ($row->status == 'Pending')
                                                                <div class="text-warning">
                                                                    {{ $row->status }}
                                                                </div>
                                                            @endif
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div class="d-flex justify-content-start flex-shrink-0">
                                                            <a href="{{ route('booking-details', [$row->id]) }}"
                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                            fill="black" />
                                                                        <path opacity="0.3"
                                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="mb-2 card-title">Activity overview</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($timeline as $row)
                                    @php
                                        $statusClasses = [
                                            'Processing' => 'info',
                                            'Pending' => 'warning',
                                            'Rejected' => 'danger',
                                            'Accepted' => 'success',
                                            'OnTheWay' => 'info',
                                            'Collected' => 'success',
                                        ];
                                        // Default to 'secondary' if no matching class
                                        $borderClass = $statusClasses[$row->booking->status] ?? 'secondary';
                                    @endphp
                                    <div class="mb-2 d-flex profile-media align-items-top">
                                        <!-- Circle indicator with dynamic color -->
                                        <div class="mt-1 profile-dots-pills text-{{ $borderClass }}"></div>
                                        <div class="ms-4">
                                            <h6 class="mb-1">{{ $row->description }}</h6>
                                            <span class="mb-0">by {{ $row->user->name }} ||
                                                {{ $row->created_at->format('d M h:i A') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card bg-soft-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-info rounded p-3">
                                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="counter">{{ $spadmin }}</h2>
                                        Superadmins
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card bg-soft-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-warning rounded p-3">
                                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="counter">{{ $admin }}</h2>
                                        Admins
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card bg-soft-danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-danger rounded p-3">
                                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="counter">{{ $collector }}</h2>
                                        Collector
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card bg-soft-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="bg-soft-primary rounded p-3">
                                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="counter">{{ $client }}</h2>
                                        Clients
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fullcalender Javascript -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                },
                slotMinTime: '07:00:00', // Start displaying from 8:00 AM
                slotMaxTime: '19:00:00', // Stop displaying at 6:00 PM
                events: @json($bookings),
                eventTimeFormat: { // Customize time format
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short',
                },
                // editable: true, // Optional: Allow events to be draggable
            });
            calendar.render();
        });
    </script>
@endsection

{{--

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('SuperAdmin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>

                    <div class="card-body">
                        {{ __('Admin Register Form!') }}
                        <form method="POST" action="{{ route('createadmin') }}">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dob"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date"
                                        class="form-control @error('dob') is-invalid @enderror" name="dob" required
                                        autocomplete="dob">

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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

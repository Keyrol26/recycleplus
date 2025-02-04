@extends('user.master')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Booking Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li class="current">Booking Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <h2 class="title">{{ $detail->pickup_id }}
                                    @if ($detail->pickup_status == 'OnTheWay')
                                        <span class="badge text-bg-primary">On The Way</span>
                                    @endif
                                    @if ($detail->pickup_status == 'Collected')
                                        <span class="badge text-bg-info">Collected</span>
                                    @endif
                                    @if ($detail->status == 'Processing' && $detail->pickup_status == null)
                                        <span class="badge text-bg-info">Processing</span>
                                    @endif
                                    @if ($detail->status == 'Accepted' && $detail->pickup_status == null)
                                        <span class="badge text-bg-success">Accepted</span>
                                    @endif
                                    @if ($detail->status == 'Rejected' && $detail->pickup_status == null)
                                        <span class="badge text-bg-danger">Rejected</span>
                                    @endif
                                    @if ($detail->status == 'Pending' && $detail->pickup_status == null)
                                        <span class="badge text-bg-warning">Pending</span>
                                    @endif
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                            {{ $detail->name }}</li>
                                        <li class="d-flex align-items-center"><i class="bi bi-phone"></i>
                                            {{ $detail->phoneno }}</li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                            <date date="2020-01-01">Created Date:
                                                {{ $detail->created_at->format('M d, Y') }}</date>
                                        </li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    <h3>Pick-Up Date and Time.</h3>
                                    <p style="margin-bottom: 0.25em"><i class="bi bi-calendar"></i>
                                        {{ \Carbon\Carbon::parse($detail->pickup_date)->format('M j, Y') }}
                                    </p>
                                    <p><i class="bi bi-clock"></i>
                                        {{ \Carbon\Carbon::parse($detail->pickup_time)->format('h:i A') }}
                                    </p>
                                    <h3>Address. </h3>
                                    <p>Label : <span>{{ $detail->address->address_type }}</span></p>
                                    <p style="margin-bottom: 0.25em">
                                        {{ strtoupper($detail->address->street) }},
                                    </p>
                                    <p style="margin-bottom: 0.25em">
                                        {{ strtoupper($detail->address->city) }},
                                    </p>
                                    <p style="margin-bottom: 0.25em">
                                        {{ $detail->address->state }},
                                    </p>
                                    <p>
                                        {{ $detail->address->postal_code }} {{ $detail->address->country }},
                                    </p>
                                    <img src="{{ Storage::url($detail->image->recycle_image) }}" class="img-fluid"
                                        alt="">
                                    <h3>Waste Details.</h3>
                                    <p>
                                        @if ($detail->category->paper)
                                            Paper,
                                        @endif
                                        @if ($detail->category->plastic)
                                            Plastic,
                                        @endif
                                        @if ($detail->category->electronic)
                                            Electronic,
                                        @endif
                                        @if ($detail->category->aluminium)
                                            Aluminium,
                                        @endif
                                        @if ($detail->category->steel)
                                            Steel,
                                        @endif
                                        @if ($detail->category->cardboard)
                                            Cardboard,
                                        @endif
                                        @if ($detail->category->textiles)
                                            Textiles,
                                        @endif
                                        @if ($detail->category->metal)
                                            Metal,
                                        @endif
                                        @if ($detail->category->glass)
                                            Glass
                                        @endif
                                    </p>
                                    <p>Est. Weight : {{ $detail->est_weight }} KG</p>
                                    <h3>Alternate Phone Number.</h3>
                                    <p>
                                        {{ $detail->alt_phoneno ?? 'N/A' }}
                                    </p>
                                    <h3>Additional Note.</h3>
                                    {{-- @if (empty($detail->note))
                                        <p>N/A</p>
                                    @else --}}
                                    <p>
                                        {{ $detail->note ?? 'N/A' }}
                                    </p>
                                    {{-- @endif --}}
                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        @if ($detail->category->paper)
                                            <li>Paper</li>
                                        @endif
                                        @if ($detail->category->plastic)
                                            <li>Plastic</li>
                                        @endif
                                        @if ($detail->category->electronic)
                                            <li>Electronic</li>
                                        @endif
                                        @if ($detail->category->aluminium)
                                            <li>Aluminium</li>
                                        @endif
                                        @if ($detail->category->steel)
                                            <li>Steel</li>
                                        @endif
                                        @if ($detail->category->cardboard)
                                            <li>Cardboard</li>
                                        @endif
                                        @if ($detail->category->textiles)
                                            <li>Textiles</li>
                                        @endif
                                        @if ($detail->category->metal)
                                            Metal,
                                        @endif
                                        @if ($detail->category->glass)
                                            Glass
                                        @endif
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->
                </div>

                <div class="col-lg-4 sidebar">
                    @if ($detail->collector_id != null)
                        <div class="widgets-container">
                            <div class="recent-posts-widget widget-item">
                                <h3 class="widget-title">Assigned Collector <i class="bi bi-person-badge"></i></h3>
                                <p>Name : {{ $detail->collector->user->name }}</p>
                                <p>Contact Number : <a
                                        href="tel:{{ $detail->collector->user->userprofile->phoneno }}">{{ $detail->collector->user->userprofile->phoneno }}</a>
                                </p>
                            </div>
                        </div>
                    @endif
                    <div class="widgets-container">
                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Image Validation Status <i class="bi bi-image"></i></h3>

                            <div class="post-item">
                                <h4>Status :
                                    @if ($detail->image->validation_status == 'Valid')
                                        <span class="badge text-bg-success">Valid</span>
                                    @elseif ($detail->image->validation_status == 'Invalid')
                                        <span class="badge text-bg-danger">Invalid</span>
                                    @else
                                        <span class="badge text-bg-info">In-Process</span>
                                    @endif
                                </h4>
                            </div>
                        </div><!-- End recent post item-->
                    </div><!--/Recent Posts Widget -->
                    <div class="widgets-container">
                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Recent Booking Details</h3>
                            @foreach ($history as $data)
                                <div class="post-item">
                                    <img src="{{ Storage::url($data->image->recycle_image) }}" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a
                                                href="{{ route('history-details', [$data->id]) }}">{{ $data->pickup_id }}</a>
                                        </h4>
                                        <date date="2022-01-01">Created Date:
                                            {{ $data->created_at->format('M d, Y') }}
                                        </date>
                                        <h4>
                                            <a href="{{ route('history-details', [$data->id]) }}">Status :
                                                @if ($data->status == 'Processing' && $data->pickup_status == null)
                                                    <span class="badge text-bg-info">Processing</span>
                                                @endif
                                                @if ($data->status == 'Accepted' && $data->pickup_status == null)
                                                    <span class="badge text-bg-success">Accepted</span>
                                                @endif
                                                @if ($data->status == 'Rejected' && $data->pickup_status == null)
                                                    <span class="badge text-bg-danger">Rejected</span>
                                                @endif
                                                @if ($data->status == 'Pending' && $data->pickup_status == null)
                                                    <span class="badge text-bg-warning">Pending</span>
                                                @endif
                                                @if ($data->pickup_status == 'OnTheWay')
                                                    <span class="badge text-bg-primary">On The Way</span>
                                                @endif
                                                @if ($data->pickup_status == 'Collected')
                                                    <span class="badge text-bg-info">Collected</span>
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach
                        </div><!--/Recent Posts Widget -->

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

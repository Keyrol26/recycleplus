@extends('user.master')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">History</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">History</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">
            <div class="container">
                {{-- <div class="input-group search-input d-flex w-100">
                    <span class="input-group-text" id="basic-addon1">PK</span>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search By Id">
                </div> --}}
                <br>
                <div class="row gy-4">
                    @if ($history->isEmpty())
                        <blockquote>
                            <p>You have not yet make any booking!!</p>
                        </blockquote>
                    @else
                        @foreach ($history as $data)
                            <div class="col-lg-4">
                                <article>
                                    {{-- <div class="post-img">
                                        <img src="{{ Storage::url($data->image->recycle_image) }}" alt=""
                                            class="img-fluid">
                                    </div> --}}
                                    <div class="post-img">
                                        <img
                                            src="{{ Storage::url($data->image->recycle_image) }}"
                                            alt=""
                                            class="img-fluid"
                                            style="width: 100%; height: auto; object-fit: cover;"
                                        >
                                    </div>
                                    <p class="post-category">Waste Categories:
                                        @if ($data->category->paper)
                                            Paper,
                                        @endif
                                        @if ($data->category->plastic)
                                            Plastic,
                                        @endif
                                        @if ($data->category->electronic)
                                            Electronic,
                                        @endif
                                        @if ($data->category->aluminium)
                                            Aluminium,
                                        @endif
                                        @if ($data->category->steel)
                                            Steel,
                                        @endif
                                        @if ($data->category->cardboard)
                                            Cardboard,
                                        @endif
                                        @if ($data->category->textiles)
                                            Textiles,
                                        @endif
                                        @if ($data->category->metal)
                                            Metal
                                        @endif
                                        @if ($data->category->glass)
                                            Glass
                                        @endif
                                    </p>
                                    <p class="post-category">Est. Weight: {{ $data->est_weight }} KG</p>
                                    <h2 class="title">
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
                                    </h2>
                                    <div class="d-flex align-items-center">
                                        <div class="post-meta">
                                            <p class="post-author"> <a
                                                    href="{{ route('history-details', [$data->id]) }}">{{ $data->pickup_id }}
                                                </a>
                                            </p>
                                            <p class="post-date">
                                                <date date="2022-01-01">Created Date:
                                                    {{ $data->created_at->format('M d, Y') }}
                                                </date>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div><!-- End post list item -->
                        @endforeach
                    @endif
                </div>
                {{-- <div class="row gy-4" id="history-container">
                    @foreach ($history as $data)
                        <div class="col-lg-4 history-item">
                            @include('components.history-card', ['data' => $data])
                        </div>
                    @endforeach
                </div> --}}
            </div>

        </section>
        <!-- /Blog Posts Section -->

        <!-- Blog Pagination Section -->
        {{-- <section id="blog-pagination" class="blog-pagination section">

            <div class="container">

            </div>
        </section><!-- /Blog Pagination Section --> --}}
        <!-- Pagination Links -->
        <div id="pagination-links" class="d-flex justify-content-center">
            {{ $history->links('pagination::bootstrap-4') }}
        </div>
    </main>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const historyContainer = document.getElementById('history-container');
            const paginationLinks = document.getElementById('pagination-links');

            // Fetch data from the server
            function fetchData(url) {
                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        renderHistory(data.data);
                        renderPagination(data.links);
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Render history items
            function renderHistory(data) {
                historyContainer.innerHTML = '';
                if (data.length === 0) {
                    historyContainer.innerHTML = '<p>No results found!</p>';
                } else {
                    data.forEach(item => {
                        const card = `
                            <div class="col-lg-4">
                                <article>
                                    <div class="post-img">
                                        <img src="/storage/${item.image.recycle_image}" alt="" class="img-fluid">
                                    </div>
                                    <p class="post-category">Waste Categories: ${item.category.name}</p>
                                    <p class="post-category">Est. Weight: ${item.est_weight} KG</p>
                                    <h2 class="title">
                                        <a href="/history-details/${item.id}">Status:
                                            <span class="badge text-bg-info">${item.status}</span>
                                        </a>
                                    </h2>

                                </article>
                            </div>
                        `;
                        historyContainer.innerHTML += card;
                    });
                }
            }


            // Search input event listener
            searchInput.addEventListener('input', function() {
                const query = this.value;
                fetchData(`{{ route('history.search') }}?search=${query}`);
            });

        });
    </script> --}}
@endsection

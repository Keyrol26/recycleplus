@if ($history->isEmpty())
    <blockquote>
        <p>You have not yet made any bookings!!</p>
    </blockquote>
@else
    @foreach ($history as $data)
        <div class="col-lg-4">
            <article>
                <div class="post-img">
                    <img src="{{ Storage::url($data->image->recycle_image) }}" alt="" class="img-fluid">
                </div>
                <p class="post-category">Waste Categories:
                    @if ($data->category->paper) Paper, @endif
                    @if ($data->category->plastic) Plastic, @endif
                    @if ($data->category->electronic) Electronic, @endif
                    @if ($data->category->aluminium) Aluminium, @endif
                    @if ($data->category->steel) Steel, @endif
                    @if ($data->category->cardboard) Cardboard, @endif
                    @if ($data->category->textiles) Textiles, @endif
                    @if ($data->category->metal) Metal @endif
                    @if ($data->category->glass) Glass @endif
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
                        <p class="post-author"><a href="{{ route('history-details', [$data->id]) }}">{{ $data->pickup_id }}</a></p>
                        <p class="post-date">
                            <date date="2022-01-01">Created Date: {{ $data->created_at->format('M d, Y') }}</date>
                        </p>
                    </div>
                </div>
            </article>
        </div><!-- End post list item -->
    @endforeach
@endif

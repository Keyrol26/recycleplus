<div class="modal" tabindex="-1" id="modalcollector">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Collector for {{ $data->pickup_id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-4 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Available Slots</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availableCollectors as $collector)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $collector->user->name }}</td>
                                    <td>{{ $collector->available_slots }}</td>
                                    <td>
                                        <form method="post" name="submit" class="form"
                                            action="{{ route('admin.assignedcollector', ['bookingId' => $data->id, 'collectorId' => $collector->id]) }}">
                                            @csrf
                                            @method('put')
                                            <div class="d-flex flex-shrink-0">
                                                <button type="submit"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                            height="25" fill="currentColor"
                                                            class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                            <path
                                                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<form method="post" name="submit" action="{{ route('admin.updatestatus', $data->id) }}">
    @csrf
    @method('put')
    <div class="modal" tabindex="-1" id="modalstatus">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status for {{ $data->pickup_id }} |
                        @if ($data->pickup_status != null)
                            @if ($data->pickup_status == 'OnTheWay')
                                <span class="mb-0 text-info">
                                    {{ $data->pickup_status }}
                                </span>
                            @elseif ($data->pickup_status == 'Collected')
                                <span class="mb-0 text-success">
                                    {{ $data->pickup_status }}
                                </span>
                            @endif
                        @else
                            @if ($data->status == 'Processing')
                                <span class="mb-0 text-info">
                                    {{ $data->status }}
                                </span>
                            @elseif ($data->status == 'Accepted')
                                <span class="mb-0 text-success">
                                    {{ $data->status }}
                                </span>
                            @elseif ($data->status == 'Rejected')
                                <span class="mb-0 text-danger">
                                    {{ $data->status }}
                                </span>
                            @elseif ($data->status == 'Pending')
                                <span class="mb-0 text-warning">
                                    {{ $data->status }}
                                </span>
                            @elseif ($data->status == 'Completed')
                                <span class="mb-0 text-primary">
                                    {{ $data->status }}
                                </span>
                            @endif
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                            <tr class="fw-bolder">
                                <th>Booking Status :</th>
                                <td>
                                    <select name="status" class="form-control" required="true" id="status">
                                        {{-- <option value="Processing" {{ $data->status == 'Processing' ? 'selected' : '' }}>
                                        Processing</option> --}}
                                        <option value="Pending" {{ $data->status == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="Rejected" {{ $data->status == 'Rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="Accepted" {{ $data->status == 'Accepted' ? 'selected' : '' }}>
                                            Accepted
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        @endif
                        @if ($data->pickup_status != null || $data->status == 'Accepted')
                            <tr class="fw-bolder">
                                <th>Pickup Status :</th>
                                <td>
                                    <select name="pickup_status" class="form-control" required="true" id="status">
                                        <option value="OnTheWay"
                                            {{ $data->pickup_status == 'OnTheWay' ? 'selected' : '' }}>
                                            OnTheWay</option>
                                        @if ($data->pickup_status == 'OnTheWay' || $data->pickup_status == 'Collected' )
                                            <option value="Collected"
                                                {{ $data->pickup_status == 'Collected' ? 'selected' : '' }}>
                                                Collected</option>
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" name="submit" action="{{ route('admin.updatevalidationstatus', $data->id) }}">
    @csrf
    @method('put')
    <div class="modal" tabindex="-1" id="modalvalidate">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Validate Image for {{ $data->pickup_id }} | @if ($data->status == 'Processing')
                            <span class="mb-0 text-info">
                                {{ $data->status }}
                            </span>
                        @elseif ($data->status == 'Accepted')
                            <span class="mb-0 text-success">
                                {{ $data->status }}
                            </span>
                        @elseif ($data->status == 'Rejected')
                            <span class="mb-0 text-danger">
                                {{ $data->status }}
                            </span>
                        @elseif ($data->status == 'Pending')
                            <span class="mb-0 text-warning">
                                {{ $data->status }}
                            </span>
                        @elseif ($data->status == 'Completed')
                            <span class="mb-0 text-primary">
                                {{ $data->status }}
                            </span>
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr class="fw-bolder">
                            <th>Validation Status :</th>
                            <td>
                                <select name="status" class="form-control" required="true" id="status">
                                    {{-- <option value="Processing" {{ $data->status == 'Processing' ? 'selected' : '' }}>
                                        Processing</option> --}}
                                    <option value="Valid"
                                        {{ $data->image->validation_status == 'Valid' ? 'selected' : '' }}>
                                        Valid</option>
                                    <option value="Invalid"
                                        {{ $data->image->validation_status == 'Invalid' ? 'selected' : '' }}>
                                        Invalid</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

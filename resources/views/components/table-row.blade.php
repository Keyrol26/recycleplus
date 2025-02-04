<!-- resources/views/components/table-row.blade.php -->
@if ($data->isEmpty())
    <tr>
        <td align="center" colspan="7">No Data Found</td>
    </tr>
@else
    @foreach ($data as $index => $row)
        @php
            $rowCount = ($current_page - 1) * $per_page + $index + 1;
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
                <h6>{{ $rowCount }}</h6>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <img class="rounded img-fluid avatar-40 me-3 bg-soft-primary"
                        src=" {{ Storage::url($row->image->recycle_image) }}" alt="profile">
                    <h6>{{ implode(', ', $displayCategories) }}</h6>
                </div>
            </td>
            <td>
                <h6>{{ $row->est_weight }}</h6>
            </td>
            <td>
                <h6>{{ $row->pickup_id }}</h6>
            </td>
            @if (($row->pickup_status) != Null)
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
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
@endif

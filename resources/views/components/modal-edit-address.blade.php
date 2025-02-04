<div class="modal" tabindex="-1" id="{{ $modalId }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLocationModalLabel">Edit Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="validateFormAddress" method="POST"
                @if (auth()->user()->role == 2) action="{{ route('userprofile.updateaddress', [$row->id]) }}"
                @else action="{{ route('multi-profile-updateaddress', [$row->user->id, $row->id]) }}" @endif
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Label :</label>
                        <input type="text" class="form-control @error('label') is-invalid @enderror" name="label"
                            placeholder="Label" id="label" style="color: black;" value="{{ $row->address_type }}"
                            required />
                        @error('label')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Street: *</label>
                        <input type="text" class="form-control @error('street') is-invalid @enderror" name="street"
                            placeholder="Street" id="street" style="color: black;" value="{{ $row->street }}"
                            required />
                        @error('street')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label class="form-label">City: *</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                            placeholder="City" id="city" style="color: black;" value="{{ $row->city }}"
                            required />
                        @error('city')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label class="form-label">State: *</label>
                        <select id="state-{{ $loop->index }}" name="state" aria-label="Select a Type"
                            data-control="select2" data-selected="{{ $row->state ?? '' }}"
                            data-placeholder="Select a state..." class="form-select state-dropdown"
                            style="color: black;" required>
                            <option value="" disabled>Select a state...</option>
                            <option value="JOHOR" {{ $row->state == 'JOHOR' ? 'selected' : '' }}>JOHOR</option>
                            <option value="KEDAH" {{ $row->state == 'KEDAH' ? 'selected' : '' }}>KEDAH</option>
                            <option value="KELANTAN" {{ $row->state == 'KELANTAN' ? 'selected' : '' }}>KELANTAN
                            </option>
                            <option value="TERENGGANU" {{ $row->state == 'TERENGGANU' ? 'selected' : '' }}>TERENGGANU
                            </option>
                            <option value="NEGERI SEMBILAN" {{ $row->state == 'NEGERI SEMBILAN' ? 'selected' : '' }}>
                                NEGERI SEMBILAN</option>
                            <option value="PAHANG" {{ $row->state == 'PAHANG' ? 'selected' : '' }}>PAHANG</option>
                            <option value="PENANG" {{ $row->state == 'PENANG' ? 'selected' : '' }}>PENANG</option>
                            <option value="PERAK" {{ $row->state == 'PERAK' ? 'selected' : '' }}>PERAK</option>
                            <option value="PERLIS" {{ $row->state == 'PERLIS' ? 'selected' : '' }}>PERLIS</option>
                            <option value="SELANGOR" {{ $row->state == 'SELANGOR' ? 'selected' : '' }}>SELANGOR
                            </option>
                            <option value="KUALA LUMPUR" {{ $row->state == 'KUALA LUMPUR' ? 'selected' : '' }}>KUALA
                                LUMPUR</option>
                            <option value="MELAKA" {{ $row->state == 'MELAKA' ? 'selected' : '' }}>MELAKA</option>
                        </select>
                        @error('state')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label class="form-label">Postal Code: *</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                            placeholder="Postal Code" id="code" style="color: black;"
                            value="{{ $row->postal_code }}" required />
                        @error('code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div><br>
                    <div class="form-group">
                        <label class="form-label">Country: *</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                            placeholder="Country" id="country" style="color: black;" value="{{ $row->country }}" />
                        @error('country')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="{{ $modadeletelId }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLocationModalLabel">Delete Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="submit"
                @if (auth()->user()->role == 2) action="{{ route('userprofile.deleteaddress', [$row->id]) }}"
                @else
                action="{{ route('multi-profile-deleteaddress', [$row->user->id, $row->id]) }}" @endif>
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete this Address ?</h5>
                    <br>
                    <h6 class="mb-1">Label:</h6>
                    <p>{{ $row->address_type }}
                    </p>
                    <h6 class="mb-1">Address:</h6>
                    <p>{{ $row->street . ', ' . $row->postal_code . ' ' . $row->city . ', ' . $row->state ?? 'N/A' }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger font-weight-bold">Delete</button>
                </div>
        </div>
        </form>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=env('GOOGLE_MAPS_API_KEY')Y&libraries=places"></script>

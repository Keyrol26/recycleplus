<div class="modal" tabindex="-1" id="addLocationModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add New Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="validateFormAddress" method="POST"
                @if (auth()->user()->role == 2) action="{{ route('storeaddress') }}"
            @else
            action="{{ route('multi-profile-storeaddress', [$data->id]) }}" @endif
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">Label as: *</label>
                        <input type="text" class="form-control @error('label') is-invalid @enderror" name="label"
                            placeholder="Label" id="label" style="color: black;" value="" required />
                        <span id="labelError" class="text-danger"></span>
                        @error('label')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">Street: *</label>
                        <input type="text" class="form-control @error('street') is-invalid @enderror" name="street"
                            placeholder="Street" id="street" style="color: black;" value="" required />
                        <span id="streetError" class="text-danger"></span>
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">City: *</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                            placeholder="City" id="city" style="color: black;" value="" required />
                        <span id="cityError" class="text-danger"></span>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">State: *</label>
                        <select id="state" name="state" aria-label="Select a Type" data-control="select2"
                            data-placeholder="Select a state..." class="form-select" style="color: black;" required>
                            <option value="" disabled selected hidden class="placeholder">
                                Select
                                a state...*</option>
                        </select>
                        <span id="stateError" class="text-danger"></span>
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">Postal Code: *</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                            placeholder="Postal Code" id="code" style="color: black;" value="" required />
                        <span id="codeError" class="text-danger"></span>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-bottom: 0.25em">
                        <label class="form-label">Country: *</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                            placeholder="Country" id="country" style="color: black;" value="MALAYSIA" />
                        <span id="countryError" class="text-danger"></span>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

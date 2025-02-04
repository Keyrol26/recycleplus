@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Profile</title>
@endsection
@section('nav-head')
    <div>
        <h1>Hello {{ Auth::user()->name }}!</h1>
        <p>We are on a mission to help developers like you build successful projects for
            FREE.</p>
    </div>
@endsection
@section('content')
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                    <h4 class="me-2 h4">{{ $data->name }}</h4>
                                    @if ($data->role == 0)
                                        <span>- Superadmin</span>
                                    @endif
                                    @if ($data->role == 1)
                                        <span>- Admin</span>
                                    @endif
                                    @if ($data->role == 3)
                                        <span>- Collector</span>
                                    @endif
                                </div>
                            </div>
                            <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" id="profile-pills-tab"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="profile-profile-tab" data-bs-toggle="pill"
                                        href="#profile-profile" role="tab" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="profile-update-tab" data-bs-toggle="pill"
                                        href="#profile-update" role="tab" aria-selected="false">Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-security-tab" data-bs-toggle="pill"
                                        href="#profile-security" role="tab" aria-selected="false">Security</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="profile-content tab-content">
                        <div class="card">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title">Profile</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="user-profile">
                                        <img src="../../assets/images/avatars/01.png" alt="profile-img"
                                            class="rounded-pill avatar-130 img-fluid" />
                                    </div>
                                    <div class="mt-3">
                                        <h3 class="d-inline-block">{{ $data->name }}</h3>
                                        @if ($data->role == 0)
                                            <p class="d-inline-block pl-3">- Superadmin</p>
                                        @elseif ($data->role == 1)
                                            <p class="d-inline-block pl-3">- Admin</p>
                                        @elseif ($data->role == 3)
                                            <p class="d-inline-block pl-3">- Collector</p>
                                        @endif
                                        @if ($data->role == 3)
                                            @if ($data->collector->status == 'Active')
                                                <p> Status - <span class="mb-0 text-primary">Active</span>
                                                </p>
                                            @else
                                                <p> Status - <span class="mb-0 text-danger">Inactive</span>
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="profile-profile" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Profile Details</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mt-2">
                                        <h6 class="mb-1">Full Name:</h6>
                                        <p>{{ $data->name }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Email:</h6>
                                        <p>{{ $data->email }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Phone Number:</h6>
                                        <p>{{ $data->userprofile->phoneno ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Gender:</h6>
                                        <p>{{ $data->userprofile->gender ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Date of Birth:</h6>
                                        <p>{{ $data->userprofile->dob ? $data->userprofile->dob->format('M d') : 'N/A' }}
                                        </p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Joined:</h6>
                                        <p>{{ $data->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title d-flex justify-content-between">
                                        <h4 class="card-title">Address</h4>
                                        <button class="btn btn-primary btn-sm rounded-pill" type="button"
                                            data-bs-toggle="modal" data-bs-target="#addLocationModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-house-add" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                                <path
                                                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                                            </svg>
                                            Add
                                        </button>
                                    </div>
                                </div>
                                @include('components.modal-client')
                                <script src="../assets/js/bookingform.js" defer></script>
                                @if ($data->address->isEmpty())
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1">Label:</h6>
                                            <p>'N/A'</p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1">Address:</h6>
                                            <p>'N/A'</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-body">
                                        @foreach ($data->address as $row)
                                            <div class="mt-2">
                                                <h6 class="mb-1">Label:</h6>
                                                <p>{{ $row->address_type ?? 'N/A' }}</p>
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-1">Address:</h6>
                                                <p>{{ $row->street . ', ' . $row->postal_code . ' ' . $row->city . ', ' . $row->state ?? 'N/A' }}
                                                </p>
                                            </div>
                                            @if (!$loop->last)
                                                <hr class="my-3 border-top border-secondary" />
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @if ($data->role == 3)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 class="card-title">Duty Status</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1">Status:</h6>
                                            @if ($data->collector->status == 'Active')
                                                <p class="mb-0 text-primary">Active</p>
                                            @else
                                                <p class="mb-0 text-danger">Inactive</p>
                                            @endif
                                            {{-- <p class="mb-0 text-primary">{{$data->collector->status}}</p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="profile-update" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Profile Details</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="userForm" method="POST"
                                        action="{{ route('multi-profile-update', [$data->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <!-- Full Name Field -->
                                        <div class="mt-3">
                                            <h6 class="mb-1">Full Name:</h6>
                                            <input type="text"
                                                class="form-control @error('full_name') is-invalid @enderror"
                                                name="full_name" placeholder="Enter your full name" id="full_name"
                                                style="color: black;" value="{{ $data->name }}" />
                                            <span id="nameError" class="error-message"></span>
                                        </div>
                                        <!-- Phone Number Field -->
                                        <div class="mt-3">
                                            <h6 class="mb-1">Phone Number:</h6>
                                            <input type="text"
                                                class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"
                                                placeholder="Enter your phone number" id="phoneno"
                                                style="color: black;" value="{{ $data->userprofile->phoneno }}" />
                                            <span id="phonenoError" class="error-message"></span>
                                        </div>
                                        <!-- Gender Field -->
                                        <div class="mt-3">
                                            <h6 class="mb-1">Gender:</h6>
                                            <select name="gender" id="gender" class="selectpicker form-control"
                                                data-style="py-0"
                                                style="color: black;"data-placeholder="Select a gender..." required>
                                                <option value="" disabled>Select a gender...</option>
                                                <option value="Male" style="color: black;"
                                                    {{ $data->userprofile->gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female" style="color: black;"
                                                    {{ $data->userprofile->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="Prefer not to say" style="color: black;"
                                                    {{ $data->userprofile->gender == 'Prefer not to say' ? 'selected' : '' }}>
                                                    Prefer not to say</option>
                                            </select>
                                            <span id="genderError" class="error-message"></span>
                                        </div>
                                        <!-- Date of Birth Field -->
                                        <div class="mt-3">
                                            <h6 class="mb-1">Date of Birth:</h6>
                                            <input type="text" id="dob" name="dob"
                                                class="form-control flatpickr_datetime" placeholder="Select Date"
                                                style="color: black;" value="{{ $data->userprofile->dob }}">
                                            <span id="dobError" class="error-message"></span>
                                        </div>
                                        <!-- Joined Date (Disabled) -->
                                        <div class="mt-3">
                                            <h6 class="mb-1">Joined:</h6>
                                            <input type="text" class="form-control" name="joined_date"
                                                placeholder="Joined date" id="joined_date" style="color: black;"
                                                value="{{ $data->created_at->format('M d, Y') }}" disabled />
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Address</h4>
                                    </div>
                                </div>
                                @if ($data->address->isEmpty())
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1">Label:</h6>
                                            <p>'N/A'</p>
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1">Address:</h6>
                                            <p>'N/A'</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-body">
                                        @foreach ($data->address as $row)
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <h6 class="mb-1">Label:</h6>
                                                    <p>{{ $row->address_type ?? 'N/A' }}</p>
                                                </div>
                                                <div class="d-flex ms-auto">
                                                    <button class="btn btn-info btn-sm rounded-pill me-2" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editLocationModal-{{ $loop->index }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-house-gear-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708z" />
                                                            <path
                                                                d="M11.07 9.047a1.5 1.5 0 0 0-1.742.26l-.02.021a1.5 1.5 0 0 0-.261 1.742 1.5 1.5 0 0 0 0 2.86 1.5 1.5 0 0 0-.12 1.07H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6 4.724 4.724a1.5 1.5 0 0 0-1.654 1.03" />
                                                            <path
                                                                d="m13.158 9.608-.043-.148c-.181-.613-1.049-.613-1.23 0l-.043.148a.64.64 0 0 1-.921.382l-.136-.074c-.561-.306-1.175.308-.87.869l.075.136a.64.64 0 0 1-.382.92l-.148.045c-.613.18-.613 1.048 0 1.229l.148.043a.64.64 0 0 1 .382.921l-.074.136c-.306.561.308 1.175.869.87l.136-.075a.64.64 0 0 1 .92.382l.045.149c.18.612 1.048.612 1.229 0l.043-.15a.64.64 0 0 1 .921-.38l.136.074c.305.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382ZM12.5 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                                        </svg>
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-sm rounded-pill" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteLocationModal-{{ $loop->index }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-house-x-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                                            <path
                                                                d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                                            <path
                                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.646a.5.5 0 0 1 .708.707l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.707l.647-.647-.647-.646a.5.5 0 0 1 .708-.707Z" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-1">Address:</h6>
                                                <p>{{ $row->street . ', ' . $row->postal_code . ' ' . $row->city . ', ' . $row->state ?? 'N/A' }}
                                                </p>
                                            </div>
                                            @if (!$loop->last)
                                                <hr class="my-3 border-top border-secondary" />
                                            @endif
                                            @include('components.modal-edit-address', [
                                                'row' => $row,
                                                'modalId' => "editLocationModal-{$loop->index}",
                                                'modadeletelId' => "deleteLocationModal-{$loop->index}",
                                            ])
                                        @endforeach

                                    </div>
                                @endif
                            </div>

                            @if ($data->role == 3)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 class="card-title">Duty Status</h4>
                                        </div>
                                    </div>
                                    <form id="userForm" method="POST"
                                        action="{{ route('multi-profile-update-status', [$data->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <div class="card-body">
                                            <div class="mt-2">
                                                <h6 class="mb-1">Status:</h6>
                                                <div>
                                                    <label style="color: #000000;">
                                                        <input type="radio" name="status" value="Active"
                                                            {{ $data->collector->status == 'Active' ? 'checked' : '' }}
                                                            style="margin-right: 8px;">
                                                        Active
                                                    </label>
                                                </div>
                                                <div>
                                                    <label style="color: #000000;">
                                                        <input type="radio" name="status" value="Inactive"
                                                            {{ $data->collector->status == 'Inactive' ? 'checked' : '' }}
                                                            style="margin-right: 8px;">
                                                        Inactive
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="profile-security" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Change Email</h4>
                                    </div>
                                </div>
                                <form id="emailForm" method="POST"
                                    action="{{ route('multi-profile-update-email', [$data->id]) }}">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1">Email:</h6>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Enter your new email" id="email" style="color: black;"
                                                value="{{ $data->email }}" />
                                            <span id="emailError" class="text-danger"></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                </div>
                                <form id="passForm" method="POST"
                                    action="{{ route('multi-profile-update-password', [$data->id]) }}">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h6 class="mb-1">Old Password:</h6>
                                            <input type="password" class="form-control" id="oldpassword"
                                                aria-describedby="password" name="oldpassword" placeholder="********">
                                            @error('oldpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-2">
                                            <h6 class="mb-1">New Password:</h6>
                                            <input type="password" class="form-control" id="newpassword"
                                                aria-describedby="password" name="newpassword" placeholder="********">
                                            @error('newpassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const today = "{{ \Carbon\Carbon::now()->toDateString() }}"; // Get today's date dynamically from Laravel
        const datetime = document.querySelectorAll('.flatpickr_datetime');
        Array.from(datetime, (elem) => {
            if (typeof flatpickr !== typeof undefined) {
                flatpickr(elem, {
                    dateFormat: "Y-m-d", // Date and time format
                    maxDate: today,
                });
            }
        });

        // Form validation
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(msg => msg.textContent = '');

            // Validate Role
            const role = document.getElementById('gender').value;
            if (!role) {
                document.getElementById('genderError').textContent = 'Please select a gender.';
                isValid = false;
            }

            // Validate First Name
            const fname = document.getElementById('full_name').value.trim();
            if (!fname) {
                document.getElementById('nameError').textContent = 'Name is required.';
                isValid = false;
            }

            // Validate Phone Number
            const phoneno = document.getElementById('phoneno').value.trim();
            const phonePattern = /^[0-9]{10}$/; // Adjust for your phone number format
            if (!phoneno) {
                document.getElementById('phonenoError').textContent = 'Phone number is required.';
                isValid = false;
            } else if (!phonePattern.test(phoneno)) {
                document.getElementById('phonenoError').textContent =
                    'Please enter a valid phone number.';
                isValid = false;
            }

            // Validate Date of Birth
            const dob = document.getElementById('dob').value;
            if (!dob) {
                document.getElementById('dobError').textContent = 'Date of birth is required.';
                isValid = false;
            }

            // If all fields are valid, proceed
            if (isValid) {
                this.submit(); // Submit the form
            }
        });
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const emailForm = document.getElementById('emailForm');
        const currentEmail = "{{ $data->email }}"; // Fetch the current email from the backend

        // Validate email format and check if it's not the same as the current email
        emailInput.addEventListener('blur', function() {
            const newEmail = emailInput.value.trim();

            // Check if the new email is different from the current email
            if (newEmail === currentEmail) {
                emailError.textContent = "The new email must be different from the current email.";
                emailInput.classList.add('is-invalid');
                return;
            }

            // Check if the email is in the correct format using a simple regex pattern
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(newEmail)) {
                emailError.textContent = "Please enter a valid email address.";
                emailInput.classList.add('is-invalid');
            } else {
                emailError.textContent = ''; // Clear error
                emailInput.classList.remove('is-invalid'); // Remove invalid class if valid
            }
        });

        // Optional: Check on form submit to ensure email validation is applied
        emailForm.addEventListener('submit', function(event) {
            const newEmail = emailInput.value.trim();

            // Check if the email is the same as the current one or invalid
            if (newEmail === currentEmail || emailInput.classList.contains('is-invalid')) {
                event.preventDefault(); // Prevent form submission if the email is invalid or the same
                emailError.textContent = "Please enter different email before submitting.";
            }
        });

        const passForm = document.getElementById("passForm");
        const oldPasswordInput = document.getElementById("oldpassword");
        const newPasswordInput = document.getElementById("newpassword");

        const validatePasswords = () => {
            let isValid = true;

            // Clear previous errors
            oldPasswordInput.classList.remove("is-invalid");
            newPasswordInput.classList.remove("is-invalid");

            // Validate old password
            if (oldPasswordInput.value.trim() === "") {
                setError(oldPasswordInput, "Old password is required.");
                isValid = false;
            }

            // Validate new password
            const newPassword = newPasswordInput.value.trim();
            if (newPassword === "") {
                setError(newPasswordInput, "New password is required.");
                isValid = false;
            } else if (newPassword.length < 8) {
                setError(newPasswordInput, "New password must be at least 8 characters long.");
                isValid = false;
            } else if (!/[A-Za-z]/.test(newPassword) || !/\d/.test(newPassword)) {
                setError(newPasswordInput, "New password must include both letters and numbers.");
                isValid = false;
            } else if (newPassword === oldPasswordInput.value.trim()) {
                setError(newPasswordInput, "New password must not be the same as the old password.");
                isValid = false;
            }

            return isValid;
        };

        // Helper function to set error messages
        const setError = (input, message) => {
            const errorElement = document.createElement("span");
            errorElement.className = "invalid-feedback d-block";
            errorElement.textContent = message;
            input.classList.add("is-invalid");
            input.parentNode.appendChild(errorElement);
        };

        // Remove error messages on input
        [oldPasswordInput, newPasswordInput].forEach((input) => {
            input.addEventListener("input", () => {
                input.classList.remove("is-invalid");
                const errorElement = input.parentNode.querySelector(".invalid-feedback");
                if (errorElement) {
                    errorElement.remove();
                }
            });
        });

        // Form submit handler
        passForm.addEventListener("submit", function(event) {
            // Prevent form submission if validation fails
            if (!validatePasswords()) {
                event.preventDefault();
            }
        });
    </script>
@endsection

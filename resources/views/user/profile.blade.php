@extends('user.master')

@section('content')
    <main class="main">
        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-list nav flex-column" role="tablist">
                            <a href="#overview" class="nav-link active" data-bs-toggle="pill" role="tab">Overview</a>
                            <a href="#edit" class="nav-link" data-bs-toggle="pill" role="tab">Update Profile</a>
                            <a href="#address" class="nav-link" data-bs-toggle="pill" role="tab">Address Details</a>
                            <a href="#security" class="nav-link" data-bs-toggle="pill" role="tab">Security</a>
                            </li>
                        </div>

                        <h4>Fun Facts</h4>
                        <p>Recycling one aluminum can saves enough energy to power a TV for three hours, and glass can be
                            recycled endlessly without losing quality. Recycling a ton of paper saves 17 trees and 7,000
                            gallons of water, while plastic bottles take up to 450 years to decompose. Plus, recycling
                            creates 10 times more jobs than landfills—small actions, big impact!</p>
                        <img src="../../assets/images-bg/profile.jpg" alt="" class="img-fluid services-img">
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-pane fade show active " id="overview" role="tabpanel">
                                <h3>Profile Details</h3>
                                <hr>
                                <ul>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-person flex-shrink-0"></i>
                                        <div>
                                            <h4>Full Name:</h4>
                                            <p>{{ $data->name }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-envelope flex-shrink-0"></i>
                                        <div>
                                            <h4>Email:</h4>
                                            <p>{{ $data->email }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-phone flex-shrink-0"></i>
                                        <div>
                                            <h4>Contact Number:</h4>
                                            <p>{{ $data->userprofile->phoneno ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                                        <div>
                                            <h4>Address:</h4>
                                            @if ($data->address->isEMpty())
                                                <p style="margin-bottom: 0.25em">You have not yet add any address!!</p>
                                            @else
                                                @foreach ($data->address as $row)
                                                    <p style="margin-bottom: 0.25em">No.{{ $loop->iteration }}</p>
                                                    <p style="margin-bottom: 0.25em">Label:
                                                        {{ $row->address_type ?? 'N/A' }}</p>
                                                    <p style="margin-bottom: 0.25em">
                                                        {{ $row->street . ', ' . $row->postal_code . ' ' . $row->city . ', ' . $row->state ?? 'N/A' }}
                                                    </p>
                                                    @if (!$loop->last)
                                                        <hr class="my-3 border-top border-secondary" />
                                                    @endif
                                                @endforeach
                                            @endif
                                            <br>
                                        </div>
                                    </div>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-cake flex-shrink-0"></i>
                                        <div>
                                            <h4>Birthday:</h4>
                                            <p>{{ $data->userprofile->dob ? $data->userprofile->dob->format('F d') : 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                    @if ($data->userprofile->gender == 'Female')
                                        <div class="info-item d-flex">
                                            <i class="bi bi-gender-female flex-shrink-0"></i>
                                            <div>
                                                <h4>Gender:</h4>
                                                <p>Female</p>
                                            </div>
                                        </div>
                                    @elseif ($data->userprofile->gender == 'Male')
                                        <div class="info-item d-flex">
                                            <i class="bi bi-gender-male flex-shrink-0"></i>
                                            <div>
                                                <h4>Gender:</h4>
                                                <p>Male</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="info-item d-flex">
                                            <i class="bi bi-gender-ambiguous flex-shrink-0"></i>
                                            <div>
                                                <h4>Gender:</h4>
                                                <p>{{ $data->userprofile->gender ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="info-item d-flex">
                                        <i class="bi bi-calendar-check flex-shrink-0"></i>
                                        <div>
                                            <h4>Joined Date:</h4>
                                            <p>{{ $data->created_at->format('F d, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item d-flex">
                                        <i class="bi bi-patch-check flex-shrink-0"></i>
                                        <div>
                                            <h4>Verified Date:</h4>
                                            <p>{{ $data->email_verified_at->format('F d, Y') }}</p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="edit" role="tabpanel">
                                <h3>Update Profile</h3>
                                <hr>
                                <ul>
                                    <form method="post" name="submit" class="form" id="profileForm"
                                        action="{{ route('userprofile.update') }}" onsubmit="return validateProfileForm()">
                                        @csrf
                                        @method('put')

                                        <!-- Full Name -->
                                        <div class="info-item mb-3">
                                            <label for="name" class="form-label">
                                                <i class="bi bi-person flex-shrink-0"></i>Full Name:
                                            </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="Full Name" required
                                                value="{{ Auth::user()->name }}">
                                            <small class="text-danger d-none" id="nameError">Please enter your full
                                                name.</small>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="info-item mb-3">
                                            <label for="phoneno" class="form-label">
                                                <i class="bi bi-phone flex-shrink-0"></i>Contact Number:
                                            </label>
                                            <input type="text"
                                                class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"
                                                id="phoneno" placeholder="eg. 0123456789"
                                                value="{{ $data->userprofile->phoneno }}">
                                            <small class="text-danger d-none" id="phonenoError">Please enter a valid
                                                contact number (10 digits only).</small>
                                            @error('phoneno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="info-item mb-3">
                                            <label for="dob" class="form-label">
                                                <i class="bi bi-cake flex-shrink-0"></i>Date of Birth:
                                            </label>
                                            <input type="text" id="dob" name="dob"
                                                class="form-control flatpickr_datetime" placeholder="Select Date"
                                                value="{{ $data->userprofile->dob }}">
                                            <small class="text-danger d-none" id="dobError">Please select your date of
                                                birth.</small>
                                        </div>

                                        <!-- Gender -->
                                        <div class="info-item mb-3">
                                            <label for="gender" class="form-label">
                                                @if ($data->userprofile->gender == 'Female')
                                                    <i class="bi bi-gender-female flex-shrink-0"></i>
                                                @elseif ($data->userprofile->gender == 'Male')
                                                    <i class="bi bi-gender-male flex-shrink-0"></i>
                                                @else
                                                    <i class="bi bi-gender-ambiguous flex-shrink-0"></i>
                                                @endif
                                                Gender:
                                            </label>
                                            <select name="gender" id="gender" class="form-select"
                                                aria-label="Select a Gender">
                                                <option value="">Select a gender...</option>
                                                <option value="Male"
                                                    {{ $data->userprofile->gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female"
                                                    {{ $data->userprofile->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="Prefer not to say"
                                                    {{ $data->userprofile->gender == 'Prefer not to say' ? 'selected' : '' }}>
                                                    Prefer not to say
                                                </option>
                                            </select>
                                            <small class="text-danger d-none" id="genderError">Please select your
                                                gender.</small>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary" name="submit">Save
                                                Changes</button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0">Address Details</h3>
                                    <!-- Add New Address Button -->
                                    <button class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#addLocationModal">Add</button>
                                </div>
                                @include('components.modal-client')
                                <script src="../assets/js/bookingform.js" defer></script>
                                <hr>
                                <!-- Add New Address Button -->
                                <ul>
                                    <div class="info-item d-flex">
                                        <div>
                                            @if ($data->address->isEmpty())
                                                <p style="margin-bottom: 0.25em">You have not yet add any address!!</p>
                                            @else
                                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                                <h4>Address:</h4>
                                                @foreach ($data->address as $row)
                                                    <p style="margin-bottom: 0.25em">No.{{ $loop->iteration }}</p>
                                                    <p style="margin-bottom: 0.25em">Label:
                                                        {{ $row->address_type ?? 'N/A' }}</p>
                                                    <p style="margin-bottom: 0.25em">
                                                        {{ $row->street . ', ' . $row->postal_code . ' ' . $row->city . ', ' . $row->state ?? 'N/A' }}
                                                    </p>
                                                    <!-- Edit and Delete Buttons -->
                                                    <div class="d-flex justify-content-start mb-2">
                                                        <button class="btn btn-info btn-sm rounded-pill me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editLocationModal-{{ $loop->index }}">Edit</button>
                                                        <button class="btn btn-danger btn-sm rounded-pill"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteLocationModal-{{ $loop->index }}">Delete</button>
                                                    </div>
                                                    @include('components.modal-edit-address', [
                                                        'row' => $row,
                                                        'modalId' => "editLocationModal-{$loop->index}",
                                                        'modadeletelId' => "deleteLocationModal-{$loop->index}",
                                                    ])
                                                    @if (!$loop->last)
                                                        <hr class="my-3 border-top border-secondary" />
                                                    @endif
                                                @endforeach
                                            @endif
                                            <br>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="security" role="tabpanel">
                                <h3>Security</h3>
                                <hr>
                                <ul>
                                    <!-- Email Update Form -->
                                    <form method="put" name="submit" class="form" id="emailForm"
                                        action="{{ route('useremailupdate.update') }}">
                                        @csrf
                                        @method('put')
                                        <div class="info-item mb-3">
                                            <label for="email" class="form-label">
                                                <i class="bi bi-envelope flex-shrink-0"></i>Email:
                                            </label>
                                            <input type="text" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ Auth::user()->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span id="emailError" class="text-danger"></span>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Change Email</button>
                                        </div>
                                    </form>
                                </ul>
                                <hr>
                                <ul>
                                    <!-- Password Update Form -->
                                    <form method="post" name="submit" class="form" id="passform"
                                        action="{{ route('userpassupdate.update') }}"
                                        onsubmit="return validatePassword()">
                                        @csrf
                                        @method('put')
                                        <div class="info-item mb-3">
                                            <label for="password" class="form-label">
                                                <i class="bi bi-shield-lock flex-shrink-0 me-2"></i>Password:
                                            </label>
                                            <div class="position-relative">
                                                <input type="password" id="passvisible" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="New Password" autocomplete="off">
                                                <span
                                                    class="btn btn-sm btn-icon position-absolute top-50 translate-middle-y end-0 pe-2"
                                                    onclick="passfunction()" style="cursor: pointer;">
                                                    <i class="bi bi-eye-slash fs-5" id="passToggleIcon"></i>
                                                </span>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <small class="text-muted">Password must be at least 8 characters long, include
                                                an uppercase letter, a lowercase letter, a number, and a special
                                                character.</small> --}}
                                            <div id="passwordError" class="text-danger mt-2" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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

        function passfunction() {
            var x = document.getElementById("passvisible");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function validatePassword() {
            const password = document.getElementById("passvisible").value;
            const passwordError = document.getElementById("passwordError");

            // Regular expression for password validation
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!password) {
                passwordError.style.display = "block";
                passwordError.textContent = "Password field cannot be empty.";
                return false;
            }

            if (!passwordRegex.test(password)) {
                passwordError.style.display = "block";
                passwordError.textContent =
                    "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.";
                return false;
            }

            // If validation passes, hide error and allow form submission
            passwordError.style.display = "none";
            return true;
        }

        function validateProfileForm() {
            let isValid = true;

            // Validate Full Name
            const name = document.getElementById("name").value.trim();
            const nameError = document.getElementById("nameError");
            if (name === "") {
                nameError.classList.remove("d-none");
                isValid = false;
            } else {
                nameError.classList.add("d-none");
            }

            // Validate Contact Number
            const phoneno = document.getElementById("phoneno").value.trim();
            const phonenoError = document.getElementById("phonenoError");
            const phonenoPattern = /^[0-9]{10}$/; // Allow digits only, min 10 digits
            if (phoneno === "" || !phonenoPattern.test(phoneno)) {
                phonenoError.classList.remove("d-none");
                isValid = false;
            } else {
                phonenoError.classList.add("d-none");
            }

            // Validate Date of Birth
            const dob = document.getElementById("dob").value.trim();
            const dobError = document.getElementById("dobError");
            if (dob === "") {
                dobError.classList.remove("d-none");
                isValid = false;
            } else {
                dobError.classList.add("d-none");
            }

            // Validate Gender
            const gender = document.getElementById("gender").value.trim();
            const genderError = document.getElementById("genderError");
            if (gender === "") {
                genderError.classList.remove("d-none");
                isValid = false;
            } else {
                genderError.classList.add("d-none");
            }

            // Return final validation status
            return isValid;
        }

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
    </script>
@endsection

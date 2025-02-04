@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Add User</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Add New User!</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-xl-3 col-lg-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Add New User</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <img src="../../assets/images/avatars/01.png" alt="profile-pic"
                                        class="theme-color-default-img profile-pic rounded avatar-100" />
                                </div>
                            </div>
                            <form id="userForm" method="POST" action="{{ route('createuser') }}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="form-label">User Role:</label>
                                    <select name="type" id="role" class="selectpicker form-control"
                                        data-style="py-0" style="color: black;">
                                        <option value="" style="color: black;">Select</option>
                                        <option value="0" style="color: black;">Superadmin</option>
                                        <option value="1" style="color: black;">Admin</option>
                                        <option value="3" style="color: black;">Collector</option>
                                    </select>
                                    <span id="roleError" class="error-message"></span>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">New User Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="fname">First Name:</label>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                            placeholder="First Name" style="color: black;" />
                                        <span id="fnameError" class="error-message"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="lname">Last Name:</label>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            placeholder="Last Name" style="color: black;" />
                                        {{-- <span id="lnameError" class="error-message"></span> --}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="phoneno">Mobile Number:</label>
                                        <input type="text" class="form-control" id="phoneno" name="phoneno"
                                            placeholder="Mobile Number" style="color: black;" />
                                        <span id="phonenoError" class="error-message"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="dob">Date of Birth:</label>
                                        <input type="text" id="dob" name="dob"
                                            class="form-control flatpickr_datetime" placeholder="Select Date"
                                            style="color: black;">
                                        <span id="dobError" class="error-message"></span>
                                    </div>
                                </div>
                                <hr />
                                <button type="submit" class="btn btn-primary">
                                    Add New User
                                </button>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize date picker
            const today =
            "{{ \Carbon\Carbon::now()->toDateString() }}"; // Get today's date dynamically from Laravel
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
                const role = document.getElementById('role').value;
                if (!role) {
                    document.getElementById('roleError').textContent = 'Please select a role.';
                    isValid = false;
                }

                // Validate First Name
                const fname = document.getElementById('fname').value.trim();
                if (!fname) {
                    document.getElementById('fnameError').textContent = 'First name is required.';
                    isValid = false;
                }

                // // Validate Last Name
                // const lname = document.getElementById('lname').value.trim();
                // if (!lname) {
                //     document.getElementById('lnameError').textContent = 'Last name is required.';
                //     isValid = false;
                // }

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
        });
    </script>
@endsection

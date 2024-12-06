<?php 
  use App\Models\Setting;
  $setting = Setting::find(1);
 ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ $setting->favicon ? asset('images/' . $setting->favicon) : asset('noimage.png') }}" type="image/png" />
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
</head>
<body>
    <div class="wrapper">
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center">
                                <img src="{{ $setting->logo ? asset('images/' . $setting->logo) : asset('noimage.png') }}" class="img-fluid" alt="Website Logo" style="width: 80%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="card-text">See your growth and get consulting support!</p>
                                    @include('layouts.backend.alert')

                                    <form class="form-body" method="POST" id="adminLoginForm">
                                        @csrf
                                        <div class="login-separater text-center">
                                            <span>SIGN IN WITH EMAIL</span>
                                            <hr>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control radius-30 ps-5" placeholder="Email Address">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Enter Password</label>
                                                <input type="password" id="password" name="password" class="form-control radius-30 ps-5" placeholder="Enter Password">
                                                <span class="passwordShow" onclick="togglePasswordVisibility()">
                                                    <i class="bi bi-eye-slash" id="eye"></i>
                                                </span>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById("password");
        const eyeIcon = document.getElementById("eye");
        const isPasswordVisible = passwordField.type === "text";
        passwordField.type = isPasswordVisible ? "password" : "text";
        eyeIcon.className = isPasswordVisible ? "bi bi-eye-slash" : "bi bi-eye";
    }
    $('#adminLoginForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('users.login.submit') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                toastr.success(response.msg);
                if (response.role_id) {
                    // Redirect based on role_id
                    switch (response.role_id) {
                        case 1:
                            window.location.href = "/admin/dashboard";
                            break;
                        case 2:
                            window.location.href = "/employee/dashboard";
                            break;
                        case 3:
                            window.location.href = "/customer/dashboard";
                            break;
                        default:
                            window.location.href = "/admin";  // Default, if no role matched
                            break;
                    }
                } else {
                    // In case role is not provided in response, default to login page
                    window.location.href = "/admin";
                }
            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(field_name, error) {
                    $('[name="' + field_name + '"]').after('<span class="text-strong text-danger">' + error + '</span>');
                });
                toastr.error(response.responseJSON.msg || 'An error occurred.');
            }
        });
    });
</script>

</body>
</html>

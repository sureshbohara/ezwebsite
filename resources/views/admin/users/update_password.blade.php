@extends('layouts.backend.layout')

@section('title', 'User')
@section('main_title', 'Update Password')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header bg-custom">
      <h6 class="mb-0 text-light">Update Your Password</h6>
    </div>
    <div class="card-body">
      <div class="row">

        <div class="col-12 col-lg-6 d-flex">
          <div class="card border shadow-none w-100 h-100">
            <form id="updatePassword" method="POST" action="{{ route('update.password') }}">
              @csrf
              <div class="card-body row g-3">

                <div class="col-12">
                  <label class="form-label">Current Password </label>
                  <div class="input-group">
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('current_password')">
                      <i class="bi bi-eye" id="current_password_eye"></i>
                    </button>
                  </div>
                  <span class="text-danger" id="current_password_error"></span>
                </div>

                <div class="col-12">
                  <label class="form-label">New Password </label>
                  <div class="input-group">
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('new_password')">
                      <i class="bi bi-eye" id="new_password_eye"></i>
                    </button>
                  </div>
                  <span class="text-danger" id="new_password_error"></span>
                </div>

                <div class="col-12">
                  <label class="form-label">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('confirm_password')">
                      <i class="bi bi-eye" id="confirm_password_eye"></i>
                    </button>
                  </div>
                  <span class="text-danger" id="confirm_password_error"></span>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn bg-custom text-light">Save & Update</button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="card shadow-none w-100 h-100">
            <div class="card-body">
              <h6>Password Change Instructions</h6>
              <p>Please follow these instructions to change your password:</p>
              <ol>
                <li>Enter your current password in the "Current Password" field.</li>
                <li>Enter your new password in the "New Password" field.</li>
                <li>Confirm your new password by retyping it in the "Confirm Password" field.</li>
                <li>Click on the "Save & Update" button to update your password.</li>
                <li>Ensure your new password is at least 8 characters long.</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
<script type="text/javascript">
  function togglePasswordVisibility(inputId) {
    var inputElement = document.getElementById(inputId);
    var eyeElement = document.getElementById(inputId + '_eye');
    if (inputElement.type === 'password') {
      inputElement.type = 'text';
      eyeElement.classList.remove('bi-eye');
      eyeElement.classList.add('bi-eye-slash');
    } else {
      inputElement.type = 'password';
      eyeElement.classList.remove('bi-eye-slash');
      eyeElement.classList.add('bi-eye');
    }
  }

  // Handle Form Submission with AJAX
  $('#updatePassword').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    $(document).find("span.text-danger").text(""); 

    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.status) {
          $('#updatePassword')[0].reset(); 
          toastr.success(response.msg); 
        }
      },
      error: function(response) {
        if (response.status === 422) {
          $.each(response.responseJSON.errors, function(field_name, error) {
            $('#' + field_name + '_error').text(error[0]);
          });
        } else {
          toastr.error('An error occurred, please try again.');
        }
      }
    });
  });
</script>
@endpush

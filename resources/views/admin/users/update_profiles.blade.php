@extends('layouts.backend.layout')
@section('title', 'Users')
@section('main_title', 'Update Profile')
@section('content')
<main class="page-content">
   @include('layouts.backend.breadcrumb') 
  <div class="card">

    <div class="card-header bg-custom">
      <h6 class="mb-0 text-light">Update Your Profiles</h6>
    </div>

    <div class="card-body">
     <div class="row">
       <div class="col-12 col-lg-12 d-flex">
         <div class="card border shadow-none w-100">
          <form id="updateProfiles" method="post" enctype="multipart/form-data">@csrf
           <div class="card-body row g-3">

             <div class="col-md-4 col-12">
               <label class="form-label">Name</label>
               <input type="text" class="form-control" name="name" value="{{$adminDetails['name']}}">
             </div>

             <div class="col-md-4 col-12">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="email" value="{{$adminDetails['email']}}">
            </div>

            <div class="col-md-4 col-12">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{$adminDetails['address']}}">
            </div>

            <div class="col-md-4 col-12">
              <label class="form-label">Phone</label>
              <input type="text" class="form-control" placeholder="Enter Phone" name="mobile" value="{{$adminDetails['mobile']}}">
            </div>

            <div class="col-md-4 col-12">
              <label class="form-label">Gender</label>
              <select class="form-select" name="gender">
                <option value="male" {{ $adminDetails['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $adminDetails['gender'] == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $adminDetails['gender'] == 'other' ? 'selected' : '' }}>Other</option>
              </select> 
            </div>

            <div class="col-md-4 col-12">
              <label class="form-label">Profiles</label>
              <input type="file" class="form-control" name="image">
            </div>

            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea class="form-control" name="info" rows="5" cols="3" placeholder="User Information">{!! $adminDetails['info'] !!}</textarea>
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn bg-custom text-light">Save & Update</button>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>
</div>

</main>
@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#updateProfiles').submit(function (e) {
      e.preventDefault();
      $(this).find("span.text-danger").remove();
      $.ajax({
        url: "{{ route('update.profiles') }}",
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (response) {
          toastr.success(response.msg, 'Success');
        },
        error: function(response) {
          $.each(response.responseJSON.errors, function(field_name, error) {
            $('[name="' + field_name + '"]').after('<span class="text-strong text-danger">' + error + '</span>');
          });
          toastr.error(response.responseJSON.msg || 'An error occurred.');
        }
      });
    });
  });
</script>
@endpush
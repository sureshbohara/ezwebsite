@extends('layouts.backend.layout')

@section('title', 'Attendance')
@section('main_title', 'Employeer Attendance')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Attendance List</h6>
       
      </div>
        
      <div class="card-body">
         <div class="row">
         @include('employee.attendance.form')
         @include('employee.attendance.table')
         </div>
      </div>
  </div>
</main>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.SaveAttendance').change(function(e) {
            var user_id = $(this).attr('id');
            var attendance_type = $(this).val();
            var class_id = $('#getClass').val();
            var attendance_date = $('#getAttendanceDate').val();
            $.ajax({
                type: "POST",
                url: "{{ route('attendance.store') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": user_id,
                    "attendance_type": attendance_type,
                    "attendance_date": attendance_date,
                },
                dataType: "json",
                success: function(response) {
                    toastr.success(response.msg);
                    // window.location.reload();
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(field_name, error) {
                        $('[name="' + field_name + '"]').after('<span class="text-danger">' + error + '</span>');
                    });
                }
            });
        });

      
    });
</script>


@endpush
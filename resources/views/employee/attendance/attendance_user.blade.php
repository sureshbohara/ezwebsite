@extends('layouts.backend.layout')

@section('title', 'Attendance')
@section('main_title', 'Attendance Create')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb')

  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
      <div class="d-sm-flex align-items-center">
        <h5 class="mb-0 text-light">Add New Attendance</h5>
      </div>
    </div>

    <div class="card-body">
      <form method="post" action="{{ route('attendance.user') }}">
        @csrf
        <div class="box-body">
          <div class="row">
            <!-- Hidden user_id -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Attendance Date -->
            <div class="form-group col-md-5">
              <label for="date">Attendance Date <font style="color: red">*</font></label>
              <input type="date" min="{{ date('Y-m-d') }}" class="form-control" name="attendance_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Attendance Type -->
            <div class="form-group col-md-5">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="background-color: #13d3dc; color: #ffffff; padding: 10px;">Present</th>
                      <th class="text-center" style="background-color: #f4004f; color: #ffffff; padding: 10px;">Late</th>
                      <th class="text-center" style="background-color: #f39c12; color: #ffffff; padding: 10px;">Absent</th>
                      <th class="text-center" style="background-color: #77ac1a; color: #ffffff; padding: 10px;">Half Day</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">
                        <input class="present" id="present" name="attendance_type" value="Present" type="radio" required>
                        <label for="present">Present</label>
                      </td>
                      <td class="text-center">
                        <input class="late" id="late" name="attendance_type" value="Late" type="radio">
                        <label for="late">Late</label>
                      </td>
                      <td class="text-center">
                        <input class="absent" id="absent" name="attendance_type" value="Absent" type="radio">
                        <label for="absent">Absent</label>
                      </td>
                      <td class="text-center">
                        <input class="half_day" id="half_day" name="attendance_type" value="Half Day" type="radio">
                        <label for="half_day">Half Day</label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group col-md-2 align-items-end mt-2">
              <button type="submit" class="btn btn-primary btn-block">Submit Data</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
@endsection

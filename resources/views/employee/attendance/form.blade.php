<div class="col-sm-12 col-xl-12">
  <div class="rounded h-100 p-4">
    <form method="get">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label class="form-label">Attendance Date</label>
           <input type="date" class="form-control" name="attendance_date" id="getAttendanceDate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3 col-md-4" style="margin-top: 30px;">
          <button type="submit" class="btn btn-primary btn-md">Search Date</button>
          <a href="{{ route('attendance.index') }}" class="btn btn-danger btn-md text-light">Reset Data</a>
        </div>
      </div>
    </form>
  </div>
</div>
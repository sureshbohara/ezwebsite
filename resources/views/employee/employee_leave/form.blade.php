<div class="offcanvas offcanvas-end" tabindex="-1" id="Leave" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Leave</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeLeave" enctype="multipart/form-data">@csrf
    <div class="offcanvas-body">
      <div class="row">
        <!-- Start Date -->
        <div class="col-md-12 form-group mb-3">
          <label for="start_date">Start Date</label>
          <input type="date" class="form-control" name="start_date" id="start_date" min="{{ date('Y-m-d') }}" required>
        </div>

        <!-- End Date -->
        <div class="col-md-12 form-group mb-3">
          <label for="end_date">End Date</label>
          <input type="date" class="form-control" name="end_date" id="end_date" min="{{ date('Y-m-d') }}" required>
        </div>

        <!-- Leave Purpose -->
        <div class="col-md-12 form-group mb-3">
          <label for="leave_purpose_id">Leave Purpose</label>
          <select name="leave_purpose_id" id="leave_purpose_id" class="form-control" required>
            <option value="">Select Leave Purpose</option>
            @foreach($leave_purposes as $purpose)
              <option value="{{ $purpose->id }}">&#x261E; {{ $purpose->name }}</option>
            @endforeach
            <option value="0">New Purpose</option>
          </select>
        </div>

        <!-- New Purpose Input -->
        <div class="col-md-12 form-group mb-3" style="display: none;" id="add_purpose">
          <label for="new_purpose">Type Leave Purpose</label>
          <input type="text" name="name" id="new_purpose" class="form-control" placeholder="Write purpose">
        </div>

        <!-- Submit Button -->
        <div class="col-md-12 form-group mb-3">
          <button type="submit" class="btn btn-primary">Create New Data</button>
        </div>
      </div>
    </div>
  </form>
</div>


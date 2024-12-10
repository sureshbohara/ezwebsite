<div class="card radius-10">
  <div class="card-header bg-transparent">
    <div class="row g-3 align-items-center">
      <div class="col">
        <h5 class="mb-0">User Login Status</h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#ID</th>
            <th>User Role</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getUserData as $key => $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->role->name }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->mobile }}</td>
              <td>
                @if(\App\Helpers\UserHelper::isOnline($data))
                  <span class="badge bg-success">Online</span>
                @else
                  <span class="badge bg-danger">Offline</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

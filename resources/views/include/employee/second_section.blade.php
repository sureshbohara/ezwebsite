<div class="card radius-10">
  <div class="card-header bg-transparent">
    <div class="row g-3 align-items-center">
      <div class="col">
        <h5 class="mb-0">Today Client Call</h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
         
          <tr>
            <th>#ID</th>
            <th>Client Name</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>Business Type</th>
            <th>Business Status</th>
          </tr>
        
        </thead>
        <tbody>
           @foreach($getDatas as $key => $data)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$data['owner_name']}}</td>
            <td>{{$data['phone']}}</td>
            <td>{{$data['email']}}</td>
            <td>{{$data['business_type']}}</td>
            <td>{{$data['business_status']}}</td>
          </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

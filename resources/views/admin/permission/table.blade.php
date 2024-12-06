 <div class="card mb-2">
   <div class="card-header bg-custom d-flex align-items-center justify-content-between">
    <h6 class="mb-0 text-light">System Users Permission List</h6>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-12 col-lg-12">
    
        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th>User Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td>{{$data['role']['name']}}</td>

              <td>
                <div class="d-flex align-items-center gap-3 fs-6">

                  <div class="btn-group">
                    <a href="#" data-bs-toggle="dropdown">
                     <i class="bx bx-dots-horizontal-rounded font-24"></i>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">

                    <a class="dropdown-item" href="{{route('permission.edit',$data['id'])}}">
                      <i class="bi bi-arrow-right"></i> Edit Date</a>

                      <form action="{{ route('permission.destroy', $data['id']) }}" method="POST" id="deleteForm{{ $data['id'] }}">
                        @csrf
                        @method('DELETE')
                        <a class="dropdown-item" href="#" onclick="confirmDelete(event, 'deleteForm{{ $data['id'] }}')" title="delete data">

                          <i class="bi bi-arrow-right"></i> Delete Data
                        </a>
                      </form>


                    </div>

                  </div>

                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

 
    </div>
    </div>
  </div>
</div>
<div class="col-12 col-lg-12">
   <div class="card">
    <div class="card-body">
        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th>Profile</th>
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td><img src="{{$data['imageUrl']}}" alt="{{$data['name']}}" style="width: 50px;"></td>
              <td>{{$data['name']}}</td>
              <td>{{$data['role']['name']}}</td>
              <td>{{$data['email']}}</td>

              <td>
                <form id="status{{ $data->id }}" action="{{ route('status.users') }}" method="post">
                  @csrf
                  <input type="hidden" value="{{ $data->id }}" name="status_id">
                  <div id="checkbox{{ $data->id }}">
                      <input type="checkbox" {{ $data->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                  </div>
              </form>
              </td>

              <td>
                <div class="d-flex align-items-center gap-3 fs-6">

                  <div class="btn-group">
                    <a href="#" data-bs-toggle="dropdown">
                     <i class="bx bx-dots-horizontal-rounded font-24"></i>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">

                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#editUsers{{$data['id']}}" aria-controls="offcanvasRight">
                      <i class="bi bi-arrow-right"></i> Edit Date</a>

                    <form action="{{ route('user.destroy', $data['id']) }}" method="POST" id="deleteForm{{ $data['id'] }}">
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
            @include('admin.users.edit') 
            @endforeach

          </tbody>
        </table>

      <nav class="float-end mt-0" aria-label="Page navigation">
        @if($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
         {{ $datas->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
        @endif
      </nav>
   
</div>
</div>
</div>
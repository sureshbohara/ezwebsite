<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">
    <div class="card-body">

        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th scope="col"> Image</th>
              <th scope="col"> Title</th>
              <th class="col hidden-xs">Order Level</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td><img src="{{$data['imageUrl']}}" alt="{{$data['banner_title']}}" style="width: 50px;"></td>
              <td>{{$data['banner_title']}}</td>
              <td class="hidden-xs">{{$data['order_level']}}</td>

              <th>
                <form id="status{{ $data->id }}" action="{{ route('status.banner') }}" method="post">
                  @csrf
                  <input type="hidden" value="{{ $data->id }}" name="status_id">
                  <div id="checkbox{{ $data->id }}">
                      <input type="checkbox" {{ $data->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                  </div>
              </form>
              </th>
              <td>
                <div class="d-flex align-items-center gap-3 fs-6">

                  <div class="btn-group">
                    <a href="#" data-bs-toggle="dropdown">
                     <i class="bx bx-dots-horizontal-rounded font-24"></i>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">

                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#editData{{$data['id']}}" aria-controls="offcanvasRight"><i class="bi bi-arrow-right-short"></i> Edit Date</a>

                     <form action="{{ route('banner.destroy', $data['id']) }}" method="POST" id="deleteForm{{ $data['id'] }}">
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
            @include('admin.banner.edit') 
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
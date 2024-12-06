<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">
    <div class="card-body">

        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th scope="col">Display ON</th>
              <th scope="col"> Image</th>
              <th scope="col"> Title</th>
              <th scope="col">Title Url</th>
              <th class="col hidden-xs">Order Level</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td>{{$data['display_on']}}</td>
              <td><img src="{{$data['imageUrl']}}" alt="{{$data['service_title']}}" style="width: 50px;"></td>
              <td>{{$data['service_title']}}</td>
              <td><input type="text" name="slug" value="{{$data['slug']}}" data-id="{{$data['id']}}" class="slug-input form-control"></td>
              
              <td class="hidden-xs"  width="150px;">
                <input type="number" name="order_level" value="{{$data['order_level']}}" data-id="{{$data['id']}}" class="order-level-input form-control">
              </td>

              <th>
                <form id="status{{ $data->id }}" action="{{ route('status.service') }}" method="post">
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

                    <a class="dropdown-item" href="{{ route('service.edit', $data['id']) }}"><i class="bi bi-arrow-right-short"></i> Edit Date</a>

                     <form action="{{ route('service.destroy', $data['id']) }}" method="POST" id="deleteForm{{ $data['id'] }}">
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
      <nav class="float-end mt-0" aria-label="Page navigation">
         @if($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
         {{ $datas->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
        @endif
      </nav>
    </div>

  </div>
</div>
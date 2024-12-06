<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">


    <form method="get" action="{{ route('menu.index') }}" id="filterForm">
      <div class="card-header py-3">
          <div class="row align-items-center m-0">

              <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                  <select class="form-select" name="display_on" id="displayOnSelect">
                     <option value="Header Footer" {{ request('display_on') == 'Header Footer' ? 'selected' : '' }}>Header Footer</option>
                     <option value="Only Header" {{ request('display_on') == 'Only Header' ? 'selected' : '' }}>Only Header</option>
                     <option value="Only Footer" {{ request('display_on') == 'Only Footer' ? 'selected' : '' }}>Only Footer</option>
                     <option value="" {{ request('display_on') == '' ? 'selected' : '' }}>Show all</option>
                  </select>
              </div>

              <div class="col-md-5 col-6">
                   <input type="search" name="name" id="searchInput" class="form-control" value="{{ request('name') }}" placeholder="Search...">
              </div>

              <div class="col-md-2 col-6">
                   <select class="form-select" name="status" id="statusSelect">
                       <option value="" {{ request('status') === '' ? 'selected' : '' }}>Show all</option>
                       <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Publish</option>
                       <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Draft</option>
                       
                  </select>
              </div>

              <div class="col-md-2 col-6">
                  <a href="{{route('menu.index')}}" class="btn btn-custom">Reset Filter</a>
              </div>


          </div>
      </div>
   </form>

    <div class="card-body">
      <table class="table align-middle table-striped">
        <thead>
          <tr>
             <th scope="col"> IS CMS</th>
            <th scope="col">Display On</th>
            <th scope="col">Menu Name</th>
            <th scope="col">Parent Menu</th>
            <th scope="col">Menu Url</th>
            <th class="col hidden-xs">Order Level</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $data)
            <tr>

               <td>
                 <select class="form-control cms-type" name="is_cms_page" data-cms-id="{{$data['id']}}">
                  <option value="NO" {{ $data->is_cms_page == 'NO' ? 'selected' : '' }}> NO</option>
                  <option value="YES" {{ $data->is_cms_page == 'YES' ? 'selected' : '' }}>YES</option>
                </select>
              </td>

              <td>
                <select class="form-control menu-type" name="display_on" data-type-id="{{$data['id']}}">
                  <option value="Header Footer" {{ $data->display_on == 'Header Footer' ? 'selected' : '' }}> Header Footer</option>
                  <option value="Only Header" {{ $data->display_on == 'Only Header' ? 'selected' : '' }}> Only Header</option>
                  <option value="Only Footer" {{ $data->display_on == 'Only Footer' ? 'selected' : '' }}> Only Footer</option>
                </select>
              </td>
              <td>{{ $data->name }}</td>
              <td>
                @if($data->parent_id)
                 <b class="text-success"> {{ $data->parent ? $data->parent->name : 'Main Menu' }}</b>
                @else
                  <b>Main Menu</b>
                @endif
              </td>

              <td>{{ $data->url }}</td>
              <td class="hidden-xs" width="150px;">
                <input type="number" name="order_level" value="{{ $data->order_level }}" data-id="{{ $data->id }}" class="order-level-input form-control">
              </td>

              <td>
                <form action="{{ route('status.menu') }}" method="post">
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
                      <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#editData{{ $data->id }}"><i class="bi bi-arrow-right"></i> Edit</a>
                      <form action="{{ route('menu.destroy', $data->id) }}" method="POST" id="deleteForm{{ $data->id }}">
                        @csrf
                        @method('DELETE')
                        <a class="dropdown-item" href="#" onclick="confirmDelete(event, 'deleteForm{{ $data->id }}')"><i class="bi bi-arrow-right"></i> Delete</a>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @include('admin.menu.edit')
          @endforeach
        </tbody>
      </table>
      
      <nav class="float-end mt-0" aria-label="Page navigation">
        @if($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
          {{ $datas->appends(Request::except('page'))->links() }}
        @endif
      </nav>
    </div>
  </div>
</div>


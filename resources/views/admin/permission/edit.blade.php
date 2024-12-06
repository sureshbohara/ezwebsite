@extends('layouts.backend.layout')

@section('title', 'System Users')
@section('main_title', 'User Permission Update')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card mt-2">
   <div class="card-header bg-custom d-flex align-items-center justify-content-between">
    <h6 class="mb-0 text-light">System Users Permission Update</h6>
  </div>
  @php
  $actions = ['add', 'edit', 'view', 'delete'];
  $categories = ['user', 'role', 'permission', 'setting','menu','banner','service','review','faqs','gallery','page','package'];
  @endphp
  <form  method="post" action="{{route('permission.update',$permission['id'])}}" enctype="multipart/form-data">@csrf
    @method('PUT')
   <div class="card-body">
    <div class="row">

      <div class="form-group col-lg-12 col-12 mb-4">
        <label>User Role Type</label>
        <select name="role_id" class="form-control">
          @foreach(\App\Models\Role::all() as $role)
            <option value="{{$role->id}}" @if($role->id == $permission['role_id']) selected @endif>{{$role->name}}</option>
           @endforeach
        </select>
      </div>

      <div class="form-group col-lg-12 col-12 mb-4">
        <table class="table align-middle">
          <thead>
            <tr>
              <th><i class="bi bi-unlock" aria-hidden="true"></i> Access || Select All Checkbox
               <input type="checkbox" id="master"></th>
               @foreach ($actions as $action)
                   <th>
                    <i class="bi bi-{{ $action === 'add' ? 'plus-circle' : ($action === 'edit' ? 'edit' : ($action === 'view' ? 'eye' : 'trash')) }}"></i>
                    {{ ucfirst($action) }}
                   </th>
                @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
                  <tr>
                      <th scope="col">{{ ucfirst($category) }}</th>
                        @foreach ($actions as $action)
                          <td>
                              <input
                                  type="checkbox"
                                  class="sub_check"
                                  name="permission[{{ $category }}][{{ $action }}]"
                                  value="1"
                                  {{ isset($permission['permission'][$category][$action]) && $permission['permission'][$category][$action] == 1 ? 'checked' : '' }}
                                  onchange="handlePermissionChange('{{ $category }}', '{{ $action }}')"
                                  id="{{ $category }}_{{ $action }}"
                              />
                          </td>
                      @endforeach
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <div class="card-footer bg-light">
    <button type="submit" class="btn btn-primary">Save & Update Data</button>
  </div>
</form>
</div>

</main>
@endsection


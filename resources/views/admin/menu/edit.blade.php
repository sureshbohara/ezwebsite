<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{ $data->id }}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Update Menu Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form action="{{ route('menu.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="offcanvas-body">
      <div class="row">

        <!-- Menu Order Level -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="order_level">Menu Order Level <span class="text-danger">*</span></label>
          <input name="order_level" id="order_level" type="number" class="form-control" value="{{ old('order_level', $data->order_level ?? 0) }}" required>
        </div>

        <!-- Parent Menu -->
        <div class="mb-3 col-md-6">
          <label for="parent_id" class="form-label">Main Menu</label>
          <select name="parent_id" id="parent_id" class="form-control">
            <option value="">---Select Option---</option>
            @foreach(\App\Models\Menu::whereNull('parent_id')->get() as $menu)
              <option value="{{ $menu->id }}" {{ (old('parent_id', $data->parent_id) == $menu->id) ? 'selected' : '' }}>
                {{ $menu->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Menu Name -->
        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Menu Name <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="eg: Home, About Us, Contact..." value="{{ old('name', $data->name) }}" required>
        </div>

        <!-- Menu Url -->
        <div class="mb-3 col-md-12">
          <label for="url" class="form-label">Menu Url <span class="text-danger">*</span></label>
          <input type="text" name="url" id="url" class="form-control" placeholder="eg: home, about-us, contact" value="{{ old('url', $data->url) }}" required>
        </div>

        <!-- Menu Icon -->
        <div class="mb-3 col-md-12">
          <label for="menu_icon" class="form-label">Menu Icon</label>
          <input type="text" name="menu_icon" id="menu_icon" class="form-control" placeholder="eg: fa fa-home" value="{{ old('menu_icon', $data->menu_icon) }}">
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Display ON <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="Header Footer" {{ old('display_on', $data->display_on) == 'Header Footer' ? 'selected' : '' }}>Header & Footer</option>
            <option value="Only Header" {{ old('display_on', $data->display_on) == 'Only Header' ? 'selected' : '' }}>Only Header</option>
            <option value="Only Footer" {{ old('display_on', $data->display_on) == 'Only Footer' ? 'selected' : '' }}>Only Footer</option>
          </select>
        </div>

      </div>
    </div>

    <!-- Footer / Submit Button -->
    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Save & Update Menu</button>
    </div>
  </form>
</div>

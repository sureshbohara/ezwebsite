<div class="offcanvas offcanvas-end" tabindex="-1" id="menuForm" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Menu Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeMenu" enctype="multipart/form-data">@csrf
    <div class="offcanvas-body">
      <div class="row">


         <div class="mb-3 col-md-6">
            <label class="form-label" for="order_level">Menu Order Level <span class="text-danger">*</span></label>
            <input name="order_level" id="order_level" type="number" class="form-control" value="0">
          </div>

         <div class="mb-3 col-md-6">
          <label for="parent_id" class="form-label">Main Menu</label>
          <select name="parent_id" id="parent_id" class="form-control">
              <option value="">---Select Option---</option>
              @foreach(\App\Models\Menu::whereNull('parent_id')->get() as $menu)
                  <option value="{{ $menu->id }}">{{ $menu->name }}</option>
              @endforeach
          </select>
         </div>


        
        <!--  Input -->
        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Menu Name <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="eg:Home,About Us,Contact..">
        </div>


        <div class="mb-3 col-md-12">
          <label for="url" class="form-label">Menu Url <span class="text-danger">*</span></label>
          <input type="text" name="url" id="url" class="form-control" placeholder="eg:home,about-us,contact">
        </div>

        <div class="mb-3 col-md-12">
          <label for="menu_icon" class="form-label">Menu Icon</label>
          <input type="text" name="menu_icon" id="menu_icon" class="form-control" placeholder="eg:fa fa-home">
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Display ON <span class="text-danger">*</span></label>
           <select name="display_on" id="display_on" class="form-control" required>
             <option value="Header Footer">Header & Footer</option>
             <option value="Only Header">Only Header</option>
             <option value="Only Footer">Only Footer</option>
          </select>
        </div>

       

      </div>
    </div>

    <!-- Footer / Submit Button -->
    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Create Menu</button>
    </div>
  </form>
</div>

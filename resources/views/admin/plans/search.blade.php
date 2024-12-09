 <form method="get" action="{{ route('package.index') }}" id="filterForm">
  <div class="card-header py-3">
      <div class="row align-items-center m-0">

          <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
              <select class="form-select" name="display_on" id="displayOnSelect">
               <option value="Shared Hosting" {{ request('display_on') == 'Shared Hosting' ? 'selected' : '' }}>Shared Hosting</option>
               <option value="Magento Extensions" {{ request('display_on') == 'Magento Extensions' ? 'selected' : '' }}>Magento Extensions</option>
               <option value="SSL Certificates" {{ request('display_on') == 'SSL Certificates' ? 'selected' : '' }}>SSL Certificates</option>
               <option value="Website Security" {{ request('display_on') == 'Website Security' ? 'selected' : '' }}>Website Security</option>
               <option value="Website Builder" {{ request('display_on') == 'Website Builder' ? 'selected' : '' }}>Website Builder</option>
               <option value="Register a New Domain" {{ request('display_on') == 'Register a New Domain' ? 'selected' : '' }}>Register a New Domain</option>
               <option value="Transfer Domain" {{ request('display_on') == 'Transfer Domain' ? 'selected' : '' }}>Transfer Domain</option>
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
      <a href="{{route('package.index')}}" class="btn btn-custom">Reset Filter</a>
  </div>


</div>
</div>
</form>
@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'General Setting')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header py-3 bg-custom">
        <h6 class="mb-0 text-light">Update Setting</h6>
      </div>
      <form id="updateSetting">@csrf
       <div class="card-body">
      
         <div class="row">
            <!-- system setting -->
             <div class="col-12 col-lg-4">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                   <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">System Name</label>
                      <input type="text" name="system_name" class="form-control" placeholder="system_name" value="{{$setting['system_name']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">E-mail 1</label>
                      <input type="email" name="email" class="form-control" placeholder="email" value="{{$setting['email']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">E-mail 2</label>
                      <input type="email" name="email1" class="form-control" placeholder="Enter Email" value="{{$setting['email1']}}">
                    </div>


                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Phone 1</label>
                      <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$setting['phone']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Phone 2</label>
                      <input type="text" name="phone1" class="form-control" placeholder="phone1" value="{{$setting['phone1']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Phone 3</label>
                      <input type="text" name="opening_hr" class="form-control" placeholder="opening_hr" value="{{$setting['opening_hr']}}">
                    </div>


                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" placeholder="address" value="{{$setting['address']}}">
                    </div>

                    
                </div>
              </div>
            </div> 

             <!-- social setting -->
             <div class="col-12 col-lg-4">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">
                    
                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Facebook</label>
                      <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{$setting['facebook']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Twitter</label>
                      <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{$setting['twitter']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Linkedin</label>
                      <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="{{$setting['linkedin']}}">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Instagram</label>
                      <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{$setting['instagram']}}">
                    </div>
                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Youtube</label>
                      <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="{{$setting['youtube']}}">
                    </div>
                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Yelp</label>
                      <input type="text" name="tiktok" class="form-control" placeholder="Yelp" value="{{$setting['tiktok']}}">
                    </div>

                </div>
              </div>
            </div> 

            <!-- currency settting -->
             <div class="col-12 col-lg-4">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Map Url</label>
                        <textarea class="form-control" name="google_map" id="google_map" cols="12" rows="4" placeholder="Enter Google Map URL">{{$setting['google_map']}}</textarea><br>

                         <!-- Google Map Preview -->
                          <iframe src="{{$setting['google_map']}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>



                </div>
              </div>
            </div> 

         </div>
        
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save & Update</button>
     </div>
    </form>
  </div>
</main>



@endsection

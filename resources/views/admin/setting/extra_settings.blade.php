@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Extra Setting')

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
          <!-- System Settings -->
          <div class="col-12 col-lg-12">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body">
                
                  <div class="col-12 mb-3">
                    <label for="title1" class="form-label">SERVICES TITLE</label>
                    <input type="text"  name="title1" class="form-control" placeholder="Title" value="{{ $setting['title1'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info1" class="form-label">SERVICES DESCRIPTION</label>
                    <textarea class="form-control" name="title_info1" rows="4" cols="12">{{ $setting['title_info1'] }}</textarea>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="title2" class="form-label">ABOUT US TITLE</label>
                    <input type="text"  name="title2" class="form-control" placeholder="Title" value="{{ $setting['title2'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info2" class="form-label">ABOUT US DESCRIPTION</label>
                    <textarea class="form-control" name="title_info2" rows="4" cols="12">{{ $setting['title_info2'] }}</textarea>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="title3" class="form-label">DESIGNING PROCESS TITLE</label>
                    <input type="text"  name="title3" class="form-control" placeholder="Title" value="{{ $setting['title3'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info3" class="form-label">DESIGNING PROCESS DESCRIPTION</label>
                    <textarea class="form-control" name="title_info3" rows="4" cols="12">{{ $setting['title_info3'] }}</textarea>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="title4" class="form-label">FAQ's TITLE</label>
                    <input type="text"  name="title4" class="form-control" placeholder="Title" value="{{ $setting['title4'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info4" class="form-label">FAQ's DESCRIPTION</label>
                    <textarea class="form-control" name="title_info4" rows="4" cols="12">{{ $setting['title_info4'] }}</textarea>
                  </div>



                  <div class="col-12 mb-3">
                    <label for="title5" class="form-label">PORTFOLIO TITLE</label>
                    <input type="text"  name="title5" class="form-control" placeholder="Title" value="{{ $setting['title5'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info5" class="form-label">PORTFOLIO DESCRIPTION</label>
                    <textarea class="form-control" name="title_info5" rows="4" cols="12">{{ $setting['title_info5'] }}</textarea>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="title6" class="form-label">PRICING PLANS TITLE</label>
                    <input type="text"  name="title6" class="form-control" placeholder="Title" value="{{ $setting['title6'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info6" class="form-label">PRICING PLANS DESCRIPTION</label>
                    <textarea class="form-control" name="title_info6" rows="4" cols="12">{{ $setting['title_info6'] }}</textarea>
                  </div>


                   <div class="col-12 mb-3">
                    <label for="title7" class="form-label">CONTACT US TITLE</label>
                    <input type="text"  name="title7" class="form-control" placeholder="Title" value="{{ $setting['title7'] }}">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="title_info7" class="form-label">CONTACT US DESCRIPTION</label>
                    <textarea class="form-control" name="title_info7" rows="4" cols="12">{{ $setting['title_info7'] }}</textarea>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="title8" class="form-label">PARA TITLE</label>
                    <input type="text"  name="title8" class="form-control" placeholder="Title" value="{{ $setting['title8'] }}">
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


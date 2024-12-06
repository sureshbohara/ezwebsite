@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Information')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header py-3 bg-custom">
      <h6 class="mb-0 text-light">Update Information</h6>
    </div>

    <form id="updateSetting" method="POST" enctype="multipart/form-data">@csrf
      <div class="card-body">
        <div class="row">


           <div class="col-12 col-lg-12 mb-3">
            <div class="card shadow-none bg-light border">
              <div class="card-body">
                <div class="mb-3">
                  <label for="info1" class="form-label"> ABOUT US</label>
                  <textarea 
                    name="info1" 
                    id="info1" 
                    class="form-control" 
                    placeholder="Enter the reasons to choose us" 
                    cols="12" 
                    rows="7">{{ old('info1', $setting['info1']) }}</textarea>
                </div>
              </div>
            </div>
          </div>

          

          <div class="col-12 col-lg-12 mb-3">
            <div class="card shadow-none bg-light border">
              <div class="card-body">
                <div class="mb-3">
                  <label for="info2" class="form-label">OUR VISION</label>
                  <textarea 
                    name="info2" 
                    id="info2" 
                    class="form-control" 
                    placeholder="Enter Information about us" 
                    cols="12" 
                    rows="5">{{ old('info2', $setting['info2']) }}</textarea>
                </div>
              </div>
            </div>
          </div>

         
          <div class="col-12 col-lg-12 mb-3">
            <div class="card shadow-none bg-light border">
              <div class="card-body">
                <div class="mb-3">
                  <label for="info3" class="form-label">OUR MISSION</label>
                  <textarea 
                    name="info3" 
                    id="info3" 
                    class="form-control" 
                    placeholder="Enter General Information" 
                    cols="12" 
                    rows="5">{{ old('info3', $setting['info3']) }}</textarea>
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

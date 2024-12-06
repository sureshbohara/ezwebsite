@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Seo Setting')

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
         
             <div class="col-12 col-lg-12">
              <div class="card shadow-none bg-light border">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Meta Author</label>
                      <input type="text" name="meta_author" class="form-control" placeholder="meta_author" value="{{$setting['meta_author']}}" placeholder="Enter Meta Author">
                    </div>


                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" placeholder="meta_title" value="{{$setting['meta_title']}}" placeholder="Enter Meta Title">
                    </div>


                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Meta Keyword</label>
                      <input type="text" name="meta_keywords" class="form-control" placeholder="meta_keywords" value="{{$setting['meta_keywords']}}" placeholder="Enter Meta Keyword">
                      <small class="form-text text-muted">Separate keywords with a comma (,)</small>
                    </div>


                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Meta Description</label>
                      <textarea name="meta_description" class="form-control" placeholder="Enter Meta Description" cols="12" rows="5">{!! $setting['meta_description'] !!}</textarea>
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

@extends('layouts.backend.layout')

@section('title', 'Page')
@section('main_title', 'Page List')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Page List</h6>
          <a class="mb-0 btn btn-default btn-sm" href="{{route('page.create')}}">
          <i class="fa fa-plus-circle"></i> Create New Page
        </a>
      </div>
      <div class="card-body">
         <div class="row">
           @include('admin.page.table')   
         </div>
      </div>
  </div>
</main>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
      var checkbox = $(this);
      var statusId = checkbox.closest('form').find('input[name="status_id"]').val();
      checkbox.prop('disabled', true);
      $.ajax({
        url: "{{ route('status.page') }}",
        method: "POST",
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          status_id: statusId,
        },
        success: function(response) {
          checkbox.prop('disabled', false);
          if (response.status === 200) {
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg || 'Failed to update status');
          }
        },
        error: function(xhr, status, error) {
          checkbox.prop('disabled', false);
          toastr.error('An error occurred while updating the status');
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.order-level-input').on('change', function() {
        var input = $(this);
        var reviewId = input.data('id');
        var type = input.attr('name');
        var value = input.val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route("page.orderlevel") }}',
            type: 'POST',
            data: {
                _token: csrfToken,
                id: reviewId,
                [type]: value
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('order level updated successfully!');
                } else {
                    toastr.error('Failed to update price.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating price.');
            }
        });
    });

});
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.slug-input').on('change', function() {
        var input = $(this);
        var reviewId = input.data('id');
        var type = input.attr('name');
        var value = input.val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route("page.slug.update") }}',
            type: 'POST',
            data: {
                _token: csrfToken,
                id: reviewId,
                [type]: value
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Url updated successfully!');
                } else {
                    toastr.error('Failed to update price.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating price.');
            }
        });
    });

});
</script>

<script>
$(document).ready(function() {
    $('.page-type').change(function() {
        var paheTypeId = $(this).data('type-id');
        var pageType = $(this).val(); 
        $.ajax({
            url: '{{ route("page.type") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: paheTypeId,
                template: pageType
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Display On updated successfully!');
                } else {
                    toastr.error('Failed to update Display On.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating Display On.');
            }
        });
    });
});

</script>







@endpush
<?php 
  use App\Models\Setting;
  $setting = Setting::find(1);
 ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Changa-Mart Admin Dashboard" name="description" />
    <meta content="Ez Websolution" name="author" />
     @include('layouts.backend.style')
</head>
    <body>
        
        <div class="wrapper">
             @include('layouts.backend.header')
             @include('layouts.backend.sidebar')
             @yield('content')
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        </div>

    @include('layouts.backend.script')
     <script type="text/javascript">
           document.addEventListener('DOMContentLoaded', function () {
            const darkModeButton = document.getElementById('darkModeButton');
            const moonIcon = document.getElementById('moonIcon');
            const userName = document.querySelector('.user-name');
            let isDarkMode = localStorage.getItem('darkMode') === 'enabled';
            updateStyles(isDarkMode);
            darkModeButton.addEventListener('click', function () {
                isDarkMode = !isDarkMode;
                const newMode = isDarkMode ? 'enabled' : 'disabled';
                localStorage.setItem('darkMode', newMode);
                updateStyles(isDarkMode);
            });
            function updateStyles(enableDarkMode) {
                moonIcon.src = enableDarkMode 
                    ? '{{asset('moon_dark.png')}}' 
                    : '{{asset('moon_light.png')}}';
                document.documentElement.classList.toggle('dark-theme', enableDarkMode);
                userName.textContent = enableDarkMode ? 'Dark' : 'Light';
            }
        });
        </script>

        <script>
        function confirmDelete(event, formId) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                     document.getElementById(formId).submit();
                }
            });
        }
      </script>

  

<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
          if($(this).is(':checked',true))  
          {
              $(".sub_check").prop('checked', true);  
          } else {  
              $(".sub_check").prop('checked',false);  
          }  
        });
    });
</script>

<script type="text/javascript">
    $('#updateSetting').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type: 'POST',
            url: "{{ route('update.settings') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response) {
                    toastr.success(response.msg);
                    window.location.reload();
                }
            },
            error: function(response) {
             $.each(response.responseJSON.errors, function(field_name, error) {
               $('[name="' + field_name + '"]').after('<span class="text-danger">' + error + '</span>');
            });
          }

        });
    });
</script>


<script>
        $(document).ready(function() {
            $('.editor').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function(files) {
                        sendFile(files[0], $(this));
                    },
                    onMediaDelete: function(target) {
                        var imageSrc = $(target).attr('src');
                        deleteImage(imageSrc, $(this));
                    }
                }
            });
            function sendFile(file, editor) {
                var formData = new FormData();
                formData.append('file', file);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: "{{ route('ckeditor.upload') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        editor.summernote('insertImage', url);
                    },
                    error: function() {
                        alert('Error uploading image');
                    }
                });
            }
            function deleteImage(imageSrc, editor) {
                var filename = imageSrc.substring(imageSrc.lastIndexOf('/') + 1);
                $.ajax({
                    url: "{{ route('ckeditor.delete') }}",
                    method: 'POST',
                    data: { filename: filename, _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        console.log(response.message);
                        var $editable = editor.summernote('getLayoutInfo').editable[0];
                        $(`img[src="${imageSrc}"]`, $editable).remove();
                    },
                    error: function() {
                        alert('Error deleting image');
                    }
                });
            }
        });
    </script>
    

<script>
  function handleFormSubmit(formId, actionUrl) {
    $(formId).on('submit', function(e) {
      e.preventDefault(); 
      $('span.text-danger').remove();

      let formData = new FormData(this); 
      $.ajax({
        type: 'POST',  
        url: actionUrl,  
        data: formData,
        contentType: false, 
        processData: false, 
        success: function(response) {
          toastr.success(response.msg);  
          window.location.reload();
        },
        error: function(response) {
          $.each(response.responseJSON.errors, function(field_name, error) {
            $('[name="' + field_name + '"]').after('<span class="text-strong text-danger">' + error + '</span>');
          });
        }
      });
    });
  }


  handleFormSubmit('#storeUsers', "{{ route('user.store') }}");
  handleFormSubmit('#storeBanner', "{{ route('banner.store') }}");
  handleFormSubmit('#storeReview', "{{ route('review.store') }}");
  handleFormSubmit('#storeFaqs', "{{ route('faqs.store') }}");
  handleFormSubmit('#storeGallery', "{{ route('gallery.store') }}");
  handleFormSubmit('#storeMenu', "{{ route('menu.store') }}");
  handleFormSubmit('#storePlans', "{{ route('package.store') }}");
  handleFormSubmit('#storeBusiness', "{{ route('business.store') }}");

</script>

    @stack('scripts')
</body>
</html>
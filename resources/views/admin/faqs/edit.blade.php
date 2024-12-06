<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{ $data->id }}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Update FAQ Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form action="{{ route('faqs.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="offcanvas-body">
      <div class="row">

        <!-- Question Input -->
        <div class="mb-3 col-md-12">
          <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
          <input type="text" name="question" id="question" class="form-control" placeholder="FAQ's Question" value="{{ old('question', $data->question) }}" required>
        </div>

        <!-- Answer Textarea -->
        <div class="mb-3 col-md-12">
          <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
          <textarea class="form-control" name="answer" id="answer" placeholder="FAQ's answer" rows="6" required>{{ old('answer', $data->answer) }}</textarea>
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Display ON <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="default" {{ old('display_on', $data->display_on) == 'default' ? 'selected' : '' }}>Default</option>
            <option value="home" {{ old('display_on', $data->display_on) == 'home' ? 'selected' : '' }}>Home Page</option>
          </select>
        </div>

         <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level" id="order_level" type="number" class="form-control" value="{{ old('order_level', $data->order_level) }}">
                  </div>


      </div>
    </div>

    <!-- Footer / Submit Button -->
    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Update FAQ</button>
    </div>
    
  </form>
</div>

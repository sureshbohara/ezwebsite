<div class="offcanvas offcanvas-end" tabindex="-1" id="faqs" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New FAQ Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeFaqs" enctype="multipart/form-data">
    @csrf
    <div class="offcanvas-body">
      <div class="row">
        
        <!-- Question Input -->
        <div class="mb-3 col-md-12">
          <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
          <input type="text" name="question" id="question" class="form-control" placeholder="FAQ's Question" required>
        </div>

        <!-- Answer Textarea -->
        <div class="mb-3 col-md-12">
          <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
          <textarea class="form-control" name="answer" id="answer" placeholder="FAQ's Answer" rows="6" required></textarea>
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Display ON <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="default">Default</option>
            <option value="home">Home Page</option>
          </select>
        </div>

         <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level" id="order_level" type="number" class="form-control" value="0">
          </div>

      </div>
    </div>

    <!-- Footer / Submit Button -->
    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Create FAQ</button>
    </div>
  </form>
</div>

<div class="modal fade" id="sendMail{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Send E-mail {{$data['name']}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form  action="{{route('mail.send.single')}}" method="post" enctype="multipart/form-data">@csrf
      <div class="modal-body">
        <div class="row">

          <div class="col-md-12 col-12 mb-3">
            <label for="email" class="form-label"> Subscriber Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="{{$data['email']}}" required>
          </div>

          
          <div class="col-md-12 col-12 mb-3">
           <label for="category-name" class="form-label"> Message Subject/Title <span class="text-danger">*</span></label>
           <input type="text" name="title" class="form-control">
          </div>

          <div class="col-12 mb-3">
           <label  class="form-label">Message Body</label>
           <textarea name="message" class="form-control editor" rows="3" placeholder="Message Description"></textarea>
         </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Mail</button>
      </div>
    </form>

  </div>
</div>
</div>
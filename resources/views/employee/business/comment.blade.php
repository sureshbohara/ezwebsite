<div class="offcanvas offcanvas-end" tabindex="-1" id="commentData{{$data['id']}}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">{{$data['owner_name']}} - Update Comment</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" action="{{ route('comment.employee.submit', $data->id) }}">@csrf
    <div class="offcanvas-body">
      <div class="row">
        <input type="hidden" name="businesses_id" value="{{$data['id']}}">
        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
        <div class="mb-3 col-md-12">
          <label for="details" class="form-label">Remarks/Comments</label>
          <textarea class="form-control" name="comments" placeholder="Add Comment" rows="6"></textarea>
        </div>
      </div>
    </div>

    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
  </form>

  <br>

  <div class="offcanvas-body">
    <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
          <?php $comments = $data->comments()->latest()->get(); ?>
          <div class="card-body" style="margin-top: 10px; background: rgba(0,0,0,.075);">
            @foreach($comments as $val)
              <div class="d-flex flex-start">
                <div class="w-100">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-primary mb-0">
                      {{ $val['name'] }}: <span class="text-dark ms-2" style="font-size: 15px;">
                        Remarks :  {{ $val['comments'] }}
                      </span>
                    </h6>
                    <p class="mb-0">
                      ({{ $val['created_at']->diffForHumans() }})
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

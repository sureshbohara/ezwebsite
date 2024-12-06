<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

    <div class="col mb-2">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Portfolio</p>
                        <h4 class="my-1">{{$getTotalGallery}}</h4>
                        <p class="mb-0 font-13 text-success">
                            <i class="bi bi-images"></i> {{$getTotalGalleryLastWeek}} from last week
                        </p>
                    </div>
                    <div class="widget-icon-large bg-gradient-purple text-white ms-auto">
                      <i class="bi bi-images"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col mb-2">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Total Pricing Plans</p>
                    <h4 class="my-1">{{$getTotalPlans}}</h4>
                    <p class="mb-0 font-13 text-success">
                        <i class="bi bi-tags"></i> {{ $getTotalPlansLastWeek }} from last week
                    </p>
                </div>
                <div class="widget-icon-large bg-gradient-success text-white ms-auto">
                    <i class="bi bi-tags"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col mb-2">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Total FAQ's</p>
                    <h4 class="my-1">{{$getTotalFaqs}}</h4>
                    <p class="mb-0 font-13 text-danger">
                        <i class="bi bi-question-circle"></i> {{ $getTotalFaqsLastWeek }} from last week
                    </p>
                </div>
                <div class="widget-icon-large bg-gradient-danger text-white ms-auto">
                 <i class="bi bi-question-circle"></i>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="col mb-2">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Total Service</p>
                    <h4 class="my-1">{{$getTotalService}}</h4>
                    <p class="mb-0 font-13 text-success">
                        <i class="bi bi-hdd-rack-fill"></i> {{ $getTotalServiceLastWeek }} from last week
                    </p>
                </div>
                <div class="widget-icon-large bg-gradient-info text-white ms-auto">
                    <i class="bi bi-hdd-rack-fill"></i>
                </div>
            </div>
        </div>
    </div>
</div>



</div>

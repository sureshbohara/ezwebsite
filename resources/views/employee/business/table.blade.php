<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">
    @include('employee.business.search')
    <div class="card-body">

        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th scope="col"> Business Type</th>
              <th scope="col"> Business Name</th>
              <th scope="col"> Owner Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Business Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $key => $data)
            <tr>
              <td>{{$data['business_type']}}</td>
              <td>{{$data['business_name']}}</td>
              <td>{{$data['owner_name']}}</td>
              <td>{{$data['email']}}</td>
              <td>{{$data['phone']}}</td>

              <td>
                <select class="form-control business_status" name="business_status" data-status-id="{{$data['id']}}">
                  <option value="" selected disabled>---select status---</option>
                    <option value="New Lead" {{ $data->business_status == 'New Lead' ? 'selected' : '' }}>New Lead</option>
                    <option value="Initial Contact Made" {{ $data->business_status == 'Initial Contact Made' ? 'selected' : '' }}>Initial Contact Made</option>
                    <option value="Interested" {{ $data->business_status == 'Interested' ? 'selected' : '' }}>Interested</option>
                    <option value="In Negotiation" {{ $data->business_status == 'In Negotiation' ? 'selected' : '' }}>In Negotiation</option>
                    <option value="Ready to Buy" {{ $data->business_status == 'Ready to Buy' ? 'selected' : '' }}>Ready to Buy</option>
                    <option value="Scheduled Demo/Consultation" {{ $data->business_status == 'Scheduled Demo/Consultation' ? 'selected' : '' }}>Scheduled Demo/Consultation</option>
                    <option value="Proposal Sent" {{ $data->business_status == 'Proposal Sent' ? 'selected' : '' }}>Proposal Sent</option>
                    <option value="Follow-Up Needed" {{ $data->business_status == 'Follow-Up Needed' ? 'selected' : '' }}>Follow-Up Needed</option>
                    <option value="Awaiting Decision" {{ $data->business_status == 'Awaiting Decision' ? 'selected' : '' }}>Awaiting Decision</option>
                    <option value="Sale Closed/Deal Won" {{ $data->business_status == 'Sale Closed/Deal Won' ? 'selected' : '' }}>Sale Closed/Deal Won</option>
                    <option value="Sale Lost" {{ $data->business_status == 'Sale Lost' ? 'selected' : '' }}>Sale Lost</option>
                    <option value="Delayed" {{ $data->business_status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                    <option value="Not Interested" {{ $data->business_status == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
                    <option value="Ready to Start (Project Initiation)" {{ $data->business_status == 'Ready to Start (Project Initiation)' ? 'selected' : '' }}>Ready to Start (Project Initiation)</option>
                    <option value="Technical Review (For Custom Websites)" {{ $data->business_status == 'Technical Review (For Custom Websites)' ? 'selected' : '' }}>Technical Review (For Custom Websites)</option>
                    <option value="Customer Onboarding" {{ $data->business_status == 'Customer Onboarding' ? 'selected' : '' }}>Customer Onboarding</option>
                    <option value="Payment Received" {{ $data->business_status == 'Payment Received' ? 'selected' : '' }}>Payment Received</option>
                    <option value="Website Launched" {{ $data->business_status == 'Website Launched' ? 'selected' : '' }}>Website Launched</option>
                    <option value="Customer Feedback" {{ $data->business_status == 'Customer Feedback' ? 'selected' : '' }}>Customer Feedback</option>
                </select>
            </td>


              <td>
                <div class="d-flex align-items-center gap-3 fs-6">

                  <div class="btn-group">
                    <a href="#" data-bs-toggle="dropdown">
                     <i class="bx bx-dots-horizontal-rounded font-24"></i>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">

                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#commentData{{$data['id']}}" aria-controls="offcanvasRight"><i class="bi bi-arrow-right-short"></i> Add Comment</a>


                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#editData{{$data['id']}}" aria-controls="offcanvasRight"><i class="bi bi-arrow-right-short"></i> Edit Date</a>

                    <a class="dropdown-item" href="{{route('business.show',$data['id'])}}"><i class="bi bi-arrow-right-short"></i> Details</a>


                     <form action="{{ route('business.destroy', $data['id']) }}" method="POST" id="deleteForm{{ $data['id'] }}">
                        @csrf
                        @method('DELETE')
                        <a class="dropdown-item" href="#" onclick="confirmDelete(event, 'deleteForm{{ $data['id'] }}')" title="delete data">
                            <i class="bi bi-arrow-right"></i> Delete Data
                        </a>
                    </form>

                  </div>

                </div>

                </div>
              </td>
            </tr>
            @include('employee.business.edit') 
            @include('employee.business.comment') 
            @endforeach

          </tbody>
        </table>
      <nav class="float-end mt-0" aria-label="Page navigation">
         @if($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
         {{ $datas->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
        @endif
      </nav>
    </div>

  </div>
</div>
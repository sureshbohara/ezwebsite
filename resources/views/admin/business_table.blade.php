<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">

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
               <th scope="col">Agent Name</th>
               <th scope="col">Details</th>
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
              <td>{{$data['business_status']}}</td>
              <td>{{$data['users']['name']}}</td>
              <td>
                  <a href="{{route('business.details',$data['id'])}}">View Details</a>
              </td>
            </tr>
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
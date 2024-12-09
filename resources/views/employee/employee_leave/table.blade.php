<div class="col-12 col-lg-12">
  <div class="card border shadow-none w-100 h-100">
    <div class="card-body">

        <table class="table align-middle table-striped">
          <thead>
            <tr>
              <th scope="col"> #</th>
              <th scope="col"> Name</th>
              <th scope="col"> Purpose</th>
              <th scope="col">Start To End</th>
              <th scope="col">Total Days</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $value)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{$value['user']['name']}}</td>
              <td>{{$value['purpose']['name']}}</td>
              <td>{{date('Y-m-d',strtotime($value->start_date))}}&nbsp;To&nbsp;  {{date('Y-m-d',strtotime($value->end_date))}}</td> 
              <td >{{ \Carbon\Carbon::parse($value->start_date)->diffInDays(\Carbon\Carbon::parse($value->end_date)) + 1 }} Days Leave</td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <nav class="float-end mt-0" aria-label="Page navigation">
          @if($allData instanceof \Illuminate\Pagination\LengthAwarePaginator)
          {{ $allData->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
          @endif
        </nav>
    </div>

  </div>
</div>
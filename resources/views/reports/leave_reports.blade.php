@extends('layouts.backend.layout')

@section('title', 'Reports')
@section('main_title', 'Leave Reports')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
      <h6 class="mb-0 text-light">Leave Reports</h6>
    </div>
    
    <div class="card-body">
      <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="rounded h-100 p-4">
                <form method="get">
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label">User Name</label>
                            <select name="user_id" class="form-control select2" required>
                                <option value="">--- select user ---</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ Request::get('user_id') == $user->id ? 'selected' : '' }}>
                                  &#x261E;  {{ $user->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="{{ Request::get('start_date') }}">
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" value="{{ Request::get('end_date') }}">
                        </div>

                        <div class="mb-3 col-md-3" style="margin-top: 30px;">
                            <button type="submit" class="btn btn-primary btn-md">Search Data</button>
                            <a href="{{ route('reports.leave') }}" class="btn btn-danger btn-md text-light">Reset Data</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <!-- report table -->
    @if(Request::has('user_id'))
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="rounded h-100 p-4">
                <h6 class="mb-4">Record Leave Reports </h6>
                <table class="table text-start align-middle table-bordered table-hover mb-0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Purpose</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getRecord as $key => $report)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->purpose->name }}</td>
                            <td>{{ $report->start_date }}</td>
                            <td>{{ $report->end_date }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->start_date)->diffInDays(\Carbon\Carbon::parse($report->end_date)) + 1 }} Days Leave</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    </div>
  </div>
</main>


@endsection


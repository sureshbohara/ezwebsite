@extends('layouts.backend.layout')

@section('title', 'Reports')
@section('main_title', 'Attendance Reports')

@section('content')
<main class="page-content">
    @include('layouts.backend.breadcrumb') 
    <div class="card">
        <div class="card-header bg-custom d-flex align-items-center justify-content-between">
            <h6 class="mb-0 text-light">Attendance Reports</h6>
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
                                        @foreach($getUser as $user)
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
                                    <a href="{{ route('reports.attendance') }}" class="btn btn-danger btn-md text-light">Reset Data</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- report table -->
            @if(Request::has('user_id') && Request::has('start_date') && Request::has('end_date'))
                <div class="col-sm-12 col-xl-12">
                    <div class="rounded h-100 p-4">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" width="100%">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Attendance</th>
                                    <th>Attendance Date</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->user_names }}</td>
                                        <td>
                                            @if($value->attendance_type == 'Present')
                                                Present
                                            @elseif($value->attendance_type == 'Late')
                                                Late
                                            @elseif($value->attendance_type == 'Absent')
                                                Absent
                                            @elseif($value->attendance_type == 'Half Day')
                                                Half Day
                                            @endif
                                        </td>
                                        <td>{{ date("d-m-Y", strtotime($value->attendance_date)) }}</td>
                                        <td>{{ $value->created_name }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style="padding: 18px; float: right;">
                            {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection

@if(isset($users))
<div class="col-sm-12 col-xl-12">
  <div class="rounded h-100 p-4">
    <table class="table text-start align-middle table-bordered table-hover mb-0" width="100%">
        <thead>
            <tr>
                <th>User-Id</th>
                <th>User Name</th>
                <th>Attendance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)
             <?php 
                $attendance_type = '';
                $getAttendance = \App\Models\Attendance::CheckAlreadyAttendance($value->id, Request::get('attendance_date'));
                $attendance_type = !empty($getAttendance->attendance_type) ? $getAttendance->attendance_type : null;
            ?>
            <tr>
                <td>EZ-0{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <label style="margin-right: 10px;">
                        <input type="radio" name="attendance{{ $value->id }}" id="{{$value->id}}" class="SaveAttendance" value="Present" {{ $attendance_type === 'Present' ? 'checked' : '' }}> Present
                    </label>

                    <label style="margin-right: 18px;">
                        <input type="radio" name="attendance{{ $value->id }}" id="{{$value->id}}" class="SaveAttendance" value="Late" {{ $attendance_type === 'Late' ? 'checked' : '' }}> Late
                    </label>

                    <label style="margin-right: 18px;">
                        <input type="radio" name="attendance{{ $value->id }}" id="{{$value->id}}" class="SaveAttendance" value="Absent" {{ $attendance_type === 'Absent' ? 'checked' : '' }}> Absent
                    </label>

                    <label>
                        <input type="radio" name="attendance{{ $value->id }}" id="{{$value->id}}" class="SaveAttendance" value="Half Day" {{ $attendance_type === 'Half Day' ? 'checked' : '' }}> Half Day
                    </label>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endif

@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'SMTP Setting')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header py-3 bg-custom">
        <h6 class="mb-0 text-light">Update SMTP Settings</h6>
      </div>
       
       <form id="updateSetting">@csrf
       <div class="card-body">
      
         <div class="row">
         
             <!-- SMTP Settings (Mail Transport, Host, Port, Username, Password, Encryption) -->
             <div class="col-12 col-lg-4">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="mail_transport" class="form-label">Mail Transport</label>
                      <input type="text" name="mail_transport" class="form-control" value="{{ old('mail_transport', $setting['mail_transport']) }}" placeholder="Mail Transport">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_host" class="form-label">Mail Host</label>
                      <input type="text" name="mail_host" class="form-control" value="{{ old('mail_host', $setting['mail_host']) }}" placeholder="Mail Host">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_port" class="form-label">Mail Port</label>
                      <input type="text" name="mail_port" class="form-control" value="{{ old('mail_port', $setting['mail_port']) }}" placeholder="Mail Port">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_username" class="form-label">Mail Username</label>
                      <input type="text" name="mail_username" class="form-control" value="{{ old('mail_username', $setting['mail_username']) }}" placeholder="Mail Username">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_password" class="form-label">Mail Password</label>
                      <input type="text" name="mail_password" class="form-control" value="{{ old('mail_password', $setting['mail_password']) }}" placeholder="Mail Password">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_encryption" class="form-label">Mail Encryption</label>
                      <input type="text" name="mail_encryption" class="form-control" value="{{ old('mail_encryption', $setting['mail_encryption']) }}" placeholder="Mail Encryption">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="mail_from" class="form-label">Mail From</label>
                      <input type="text" name="mail_from" class="form-control" value="{{ old('mail_from', $setting['mail_from']) }}" placeholder="Mail From">
                    </div>

                </div>
              </div>
            </div> 

            <!-- SMTP Check and To Emails -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-none bg-light border h-100">
                  <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="mail_from_name" class="form-label">Mail From Name</label>
                      <input type="text" name="mail_from_name" class="form-control" value="{{ old('mail_from_name', $setting['mail_from_name']) }}" placeholder="Mail From Name">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="smtp_check" class="form-label">SMTP Check</label>
                      <select class="form-select" name="smtp_check">
                         <option value="0" {{ old('smtp_check', $setting['smtp_check']) == 0 ? 'selected' : '' }}>No</option>
                         <option value="1" {{ old('smtp_check', $setting['smtp_check']) == 1 ? 'selected' : '' }}>Yes</option>
                      </select>
                    </div>

                    <!-- Email To Fields -->
                    <div class="col-12 mb-3">
                      <label for="to_email1" class="form-label">To Mail 1</label>
                      <input type="text" name="to_email1" class="form-control" value="{{ old('to_email1', $setting['to_email1']) }}" placeholder="Enter Email">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="to_email2" class="form-label">To Mail 2</label>
                      <input type="text" name="to_email2" class="form-control" value="{{ old('to_email2', $setting['to_email2']) }}" placeholder="Enter Email">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="to_email3" class="form-label">To Mail 3</label>
                      <input type="text" name="to_email3" class="form-control" value="{{ old('to_email3', $setting['to_email3']) }}" placeholder="Enter Email">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="to_email4" class="form-label">To Mail 4</label>
                      <input type="text" name="to_email4" class="form-control" value="{{ old('to_email4', $setting['to_email4']) }}" placeholder="Enter Email">
                    </div>

                  </div>
                </div>
             </div>

              <!-- SMTP Instructions -->
              <div class="col-12 col-lg-4">
                <div class="card shadow-none bg-light border h-100">
                  <div class="card-body">
                    <div class="col-12">
                        <h6 class="mb-4">SMTP Instructions</h6>
                        <div class="row">
                            <p class="text-danger">
                                Please be careful when configuring SMTP. Incorrect configuration can result in errors when placing orders, new registrations, or sending newsletters.
                            </p>
                            <h6 class="text-muted">For Non-SSL</h6>
                            <ul class="list-group">
                                <li class="list-group-item text-dark">Select "sendmail" for Mail Driver if you face issues with SMTP as Mail Driver</li>
                                <li class="list-group-item text-dark">Set Mail Host according to your server's Mail Client Manual Settings</li>
                                <li class="list-group-item text-dark">Set Mail Port to 587</li>
                                <li class="list-group-item text-dark">Set Mail Encryption to SSL if you face issues with TLS</li>
                            </ul>
                            <br>
                            <h6 class="text-muted">For SSL</h6>
                            <ul class="list-group">
                                <li class="list-group-item text-dark">Select "sendmail" for Mail Driver if you face issues with SMTP as Mail Driver</li>
                                <li class="list-group-item text-dark">Set Mail Host according to your server's Mail Client Manual Settings</li>
                                <li class="list-group-item text-dark">Set Mail Port to 465</li>
                                <li class="list-group-item text-dark">Set Mail Encryption to SSL</li>
                            </ul>
                        </div>
                    </div>
                  </div>
               </div>
             </div>
         </div>
        
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save & Update</button>
     </div>
     
    </form>
  </div>
</main>
@endsection

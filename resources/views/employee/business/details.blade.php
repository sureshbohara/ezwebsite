@extends('layouts.backend.layout')

@section('title', 'Business')
@section('main_title', 'Business Details')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
      <h6 class="mb-0 text-light">Business Details</h6>
    </div>
    <div class="card-body">
      
      <!-- Business Information Section -->
      <div class="row">
        <!-- General Information -->
        <div class="col-md-6">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-primary text-white">General Information</div>
            <div class="card-body">
              <table class="table table-sm">
                <tbody>
                  <tr>
                    <td><strong>Business Name</strong></td>
                    <td>{{ $business->business_name }}</td>
                  </tr>
                  <tr>
                    <td><strong>Business Type</strong></td>
                    <td>{{ $business->business_type }}</td>
                  </tr>
                  <tr>
                    <td><strong>Website</strong></td>
                    <td><a href="{{ $business->website }}" target="_blank">{{ $business->website }}</a></td>
                  </tr>
                  <tr>
                    <td><strong>Owner Name</strong></td>
                    <td>{{ $business->owner_name }}</td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $business->email }}</td>
                  </tr>
                  <tr>
                    <td><strong>Phone</strong></td>
                    <td>{{ $business->phone }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Financial Information -->
        <div class="col-md-6">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-success text-white">Financial Information</div>
            <div class="card-body">
              <table class="table table-sm">
                <tbody>
                  <tr>
                    <td><strong>Designing Cost</strong></td>
                    <td>${{ number_format($business->designing_cost, 2) }}</td>
                  </tr>
                  <tr>
                    <td><strong>Hosting Cost</strong></td>
                    <td>${{ number_format($business->hosting_cost, 2) }}</td>
                  </tr>
                  <tr>
                    <td><strong>Start Date</strong></td>
                    <td>{{ \Carbon\Carbon::parse($business->start_date)->format('M d, Y') }}</td>
                  </tr>
                  <tr>
                    <td><strong>End Date</strong></td>
                    <td>{{ $business->end_date ? \Carbon\Carbon::parse($business->end_date)->format('M d, Y') : 'N/A' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Information Section -->
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-info text-white">Additional Information</div>
            <div class="card-body">
              <p><strong>Details:</strong></p>
              <p>{{ $business->details ?? 'No details available' }}</p>

              <p><strong>Card Name:</strong> {{ $business->card_name }}</p>
              <p><strong>Billing Address:</strong> {{ $business->billing_address }}</p>
              <p><strong>Business Status:</strong> 
                <span class="badge {{ $business->business_status == 'active' ? 'bg-success' : 'bg-danger' }}">
                  {{ ucfirst($business->business_status) }}
                </span>
              </p>
            </div>
          </div>
        </div>

        <!-- Comments Section -->
        <div class="col-md-6">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-info text-white">Comments</div>
            <div class="card-body">
              @if($business->comments->isEmpty())
                <p>No comments available.</p>
              @else
                <ul class="list-group">
                  @foreach($business->comments as $comment)
                    <li class="list-group-item">
                      <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                      <br>
                      <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y h:i A') }}</small>
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection

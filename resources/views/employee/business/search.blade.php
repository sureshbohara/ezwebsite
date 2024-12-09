 <form method="get" action="{{ route('business.index') }}" id="filterForm">
  <div class="card-header py-3">
      <div class="row align-items-center m-0">
          <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
              <select class="form-select" name="business_type" id="businessType">
               <option value="Transportation" {{ request('business_type') == 'Transportation' ? 'selected' : '' }}>Transportation</option>
               <option value="Health" {{ request('business_type') == 'Health' ? 'selected' : '' }}>Health</option>
               <option value="Organization" {{ request('business_type') == 'Organization' ? 'selected' : '' }}>Organization</option>
               <option value="Movers" {{ request('business_type') == 'Movers' ? 'selected' : '' }}>Movers</option>
               <option value="Ecommerce" {{ request('business_type') == 'Ecommerce' ? 'selected' : '' }}>Ecommerce</option>
               <option value="Cleaning" {{ request('business_type') == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
               <option value="Construction" {{ request('business_type') == 'Construction' ? 'selected' : '' }}>Construction</option>
               <option value="Plumbing" {{ request('business_type') == 'Plumbing' ? 'selected' : '' }}>Plumbing</option>
               <option value="Beauty Spa" {{ request('business_type') == 'Beauty Spa' ? 'selected' : '' }}>Beauty & Spa</option>
               <option value="" {{ request('business_type') == '' ? 'selected' : '' }}>Show all</option>
           </select>
       </div>

      <div class="col-md-5 col-6">
         <input type="search" name="name" id="searchInput" class="form-control" value="{{ request('name') }}" placeholder="Search...">
      </div>

       <div class="col-md-2 col-6">
        <select class="form-select" name="business_status" id="businessStatus">
            <option value="" {{ request('business_status') === '' ? 'selected' : '' }}>Show all</option>
            <option value="New Lead" {{ request('business_status') == 'New Lead' ? 'selected' : '' }}>New Lead</option>
            <option value="Initial Contact Made" {{ request('business_status') == 'Initial Contact Made' ? 'selected' : '' }}>Initial Contact Made</option>
            <option value="Interested" {{ request('business_status') == 'Interested' ? 'selected' : '' }}>Interested</option>
            <option value="In Negotiation" {{ request('business_status') == 'In Negotiation' ? 'selected' : '' }}>In Negotiation</option>
            <option value="Ready to Buy" {{ request('business_status') == 'Ready to Buy' ? 'selected' : '' }}>Ready to Buy</option>
            <option value="Scheduled Demo/Consultation" {{ request('business_status') == 'Scheduled Demo/Consultation' ? 'selected' : '' }}>Scheduled Demo/Consultation</option>
            <option value="Proposal Sent" {{ request('business_status') == 'Proposal Sent' ? 'selected' : '' }}>Proposal Sent</option>
            <option value="Follow-Up Needed" {{ request('business_status') == 'Follow-Up Needed' ? 'selected' : '' }}>Follow-Up Needed</option>
            <option value="Awaiting Decision" {{ request('business_status') == 'Awaiting Decision' ? 'selected' : '' }}>Awaiting Decision</option>
            <option value="Sale Closed/Deal Won" {{ request('business_status') == 'Sale Closed/Deal Won' ? 'selected' : '' }}>Sale Closed/Deal Won</option>
            <option value="Sale Lost" {{ request('business_status') == 'Sale Lost' ? 'selected' : '' }}>Sale Lost</option>
            <option value="Delayed" {{ request('business_status') == 'Delayed' ? 'selected' : '' }}>Delayed</option>
            <option value="Not Interested" {{ request('business_status') == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
            <option value="Ready to Start (Project Initiation)" {{ request('business_status') == 'Ready to Start (Project Initiation)' ? 'selected' : '' }}>Ready to Start (Project Initiation)</option>
            <option value="Technical Review (For Custom Websites)" {{ request('business_status') == 'Technical Review (For Custom Websites)' ? 'selected' : '' }}>Technical Review (For Custom Websites)</option>
            <option value="Customer Onboarding" {{ request('business_status') == 'Customer Onboarding' ? 'selected' : '' }}>Customer Onboarding</option>
            <option value="Payment Received" {{ request('business_status') == 'Payment Received' ? 'selected' : '' }}>Payment Received</option>
            <option value="Website Launched" {{ request('business_status') == 'Website Launched' ? 'selected' : '' }}>Website Launched</option>
            <option value="Customer Feedback" {{ request('business_status') == 'Customer Feedback' ? 'selected' : '' }}>Customer Feedback</option>
        </select>
    </div>


     <div class="col-md-2 col-6">
      <a href="{{route('business.index')}}" class="btn btn-custom">Reset Filter</a>
  </div>


</div>
</div>
</form>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
    @if(isset($businessStatusCounts['currentMonth']) && is_array($businessStatusCounts['currentMonth']))
        @foreach ($businessStatusCounts['currentMonth'] as $key => $count)
            @if(strpos($key, 'total') === 0) <!-- Filter only the total counts -->
                <div class="col mb-2">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <!-- Display the business status label -->
                                    <p class="mb-0 text-secondary">{{ ucwords(str_replace('total', '', $key)) }}</p>
                                    <h4 class="my-1">{{ $count }}</h4>
                                    <p class="mb-0 font-13 text-success">
                                        @php
                                            $prevMonthCount = $businessStatusCounts['prevMonth'][$key] ?? 0;
                                        @endphp
                                        <i class="bi bi-calendar-check"></i> {{ $prevMonthCount }} from last month
                                    </p>
                                </div>
                                <div class="widget-icon-large bg-gradient-purple text-white ms-auto">
                                    <!-- Dynamically switch icons based on status key -->
                                    @switch($key)
                                        @case('totalNewLead')
                                            <i class="bi bi-person-check"></i> <!-- New Lead -->
                                            @break
                                        @case('totalSaleClosed')
                                            <i class="bi bi-check-circle"></i> <!-- Sale Closed -->
                                            @break
                                        @case('totalSaleLost')
                                            <i class="bi bi-x-circle"></i> <!-- Sale Lost -->
                                            @break
                                        @case('totalFollowUpNeeded')
                                            <i class="bi bi-phone"></i> <!-- Follow-Up Needed -->
                                            @break
                                        @case('totalInterested')
                                            <i class="bi bi-heart"></i> <!-- Interested -->
                                            @break
                                        @case('totalInitialContactMade')
                                            <i class="bi bi-chat-left-dots"></i> <!-- Initial Contact Made -->
                                            @break
                                        @case('totalInNegotiation')
                                            <i class="bi bi-arrow-repeat"></i> <!-- In Negotiation -->
                                            @break
                                        @case('totalReadyToBuy')
                                            <i class="bi bi-cart-check"></i> <!-- Ready to Buy -->
                                            @break
                                        @case('totalScheduledDemo')
                                            <i class="bi bi-calendar-check"></i> <!-- Scheduled Demo -->
                                            @break
                                        @case('totalProposalSent')
                                            <i class="bi bi-file-earmark-text"></i> <!-- Proposal Sent -->
                                            @break
                                        @case('totalAwaitingDecision')
                                            <i class="bi bi-clock"></i> <!-- Awaiting Decision -->
                                            @break
                                        @case('totalDelayed')
                                            <i class="bi bi-hourglass-split"></i> <!-- Delayed -->
                                            @break
                                        @case('totalNotInterested')
                                            <i class="bi bi-slash-circle"></i> <!-- Not Interested -->
                                            @break
                                        @case('totalReadyToStart')
                                            <i class="bi bi-lightbulb"></i> <!-- Ready to Start -->
                                            @break
                                        @case('totalTechnicalReview')
                                            <i class="bi bi-gear"></i> <!-- Technical Review -->
                                            @break
                                        @case('totalCustomerOnboarding')
                                            <i class="bi bi-person-check"></i> <!-- Customer Onboarding -->
                                            @break
                                        @case('totalPaymentReceived')
                                            <i class="bi bi-wallet"></i> <!-- Payment Received -->
                                            @break
                                        @case('totalWebsiteLaunched')
                                            <i class="bi bi-globe"></i> <!-- Website Launched -->
                                            @break
                                        @case('totalCustomerFeedback')
                                            <i class="bi bi-chat-square-dots"></i> <!-- Customer Feedback -->
                                            @break
                                        @default
                                            <i class="bi bi-box"></i> <!-- Default Icon -->
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <p>No business status data available for the current month.</p>
    @endif
</div>

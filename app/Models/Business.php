<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_type',
        'business_name',
        'website',
        'domain_request',
        'owner_name',
        'email',
        'phone',
        'start_date',
        'end_date',
        'designing_cost',
        'hosting_cost',
        'details',
        'card_name',
        'card_number',
        'expiration_date',
        'security_code',
        'billing_address',
        'business_status',
        'created_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($business) {
            $business->comments()->delete();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'businesses_id');
    }

     public function users(){
      return $this->belongsTo(User::class, 'user_id');
    }

    public static function getRecords()
    {
        $userInfo = self::getUserInfo();
        $roleId = $userInfo['roleId'];
        $userID = $userInfo['userID'];

        $query = Business::query();

        if ($roleId == 2) {
            $query->where('user_id', $userID);
        }

        if ($businessStatus = request('business_status')) {
            $query->where('business_status', 'LIKE', '%' . $businessStatus . '%');
        }

        if ($businessType = request('business_type')) {
            $query->where('business_type', 'LIKE', '%' . $businessType . '%');
        }

        if ($userId = request('user_id')) {
            $query->where('user_id', $userId);
        }

        return $query->orderByDesc('id')->paginate(10);
    }

   public static function getRecordsDashboard(){
    $userInfo = self::getUserInfo();
    $roleId = $userInfo['roleId'];
    $userID = $userInfo['userID'];

    $query = Business::query();

      if ($roleId != 1) {
        $query->where('user_id', $userID);
      }

     $startOfDay = \Carbon\Carbon::today()->startOfDay();
     $endOfDay = \Carbon\Carbon::today()->endOfDay();
     $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
     return $query->orderByDesc('id')->paginate(10);
  }

  
public static function getBusinessStatusCount()
{
    $userInfo = self::getUserInfo();
    $roleId = $userInfo['roleId'];
    $userID = $userInfo['userID'];

    // Initialize the status counters for the current and previous months
    $statusCountsCurrentMonth = $statusCountsPrevMonth = [
        'totalClient' => 0,
        'totalNewLead' => 0,
        'totalInitialContactMade' => 0,
        'totalInterested' => 0,
        'totalInNegotiation' => 0,
        'totalReadyToBuy' => 0,
        'totalScheduledDemo' => 0,
        'totalProposalSent' => 0,
        'totalFollowUpNeeded' => 0,
        'totalAwaitingDecision' => 0,
        'totalSaleClosed' => 0,
        'totalSaleLost' => 0,
        'totalDelayed' => 0,
        'totalNotInterested' => 0,
        'totalReadyToStart' => 0,
        'totalTechnicalReview' => 0,
        'totalCustomerOnboarding' => 0,
        'totalPaymentReceived' => 0,
        'totalWebsiteLaunched' => 0,
        'totalCustomerFeedback' => 0,
    ];

    // Get businesses and filter them for the current and previous month
    $businesses = Business::query();

    if ($roleId == 2) {
        $businesses->where('user_id', $userID);
    }

    // Execute query and get results
    $businesses = $businesses->get();

    // Check if businesses are available
    if ($businesses->isEmpty()) {
        return [
            'currentMonth' => $statusCountsCurrentMonth,
            'prevMonth' => $statusCountsPrevMonth,
        ];
    }

    $currentMonthStart = now()->startOfMonth();
    $previousMonthStart = now()->subMonth()->startOfMonth();
    $previousMonthEnd = now()->subMonth()->endOfMonth();

    foreach ($businesses as $business) {
        // Assuming `business_status` is a field in your `Business` model
        // Count for total clients (i.e., every business)
        $statusCountsCurrentMonth['totalClient']++;

        // Count statuses for current month
        if ($business->created_at->greaterThanOrEqualTo($currentMonthStart)) {
            $statusCountsCurrentMonth = self::countStatus($business->business_status, $statusCountsCurrentMonth);
        }

        // Count statuses for the previous month
        if ($business->created_at->greaterThanOrEqualTo($previousMonthStart) && $business->created_at->lessThanOrEqualTo($previousMonthEnd)) {
            $statusCountsPrevMonth = self::countStatus($business->business_status, $statusCountsPrevMonth);
        }
    }

    return [
        'currentMonth' => $statusCountsCurrentMonth,
        'prevMonth' => $statusCountsPrevMonth,
    ];
}


  public static function countStatus($status, $counts) {
    switch ($status) {
        case 'New Lead': $counts['totalNewLead']++; break;
        case 'Initial Contact Made': $counts['totalInitialContactMade']++; break;
        case 'Interested': $counts['totalInterested']++; break;
        case 'In Negotiation': $counts['totalInNegotiation']++; break;
        case 'Ready to Buy': $counts['totalReadyToBuy']++; break;
        case 'Scheduled Demo/Consultation': $counts['totalScheduledDemo']++; break;
        case 'Proposal Sent': $counts['totalProposalSent']++; break;
        case 'Follow-Up Needed': $counts['totalFollowUpNeeded']++; break;
        case 'Awaiting Decision': $counts['totalAwaitingDecision']++; break;
        case 'Sale Closed/Deal Won': $counts['totalSaleClosed']++; break;
        case 'Sale Lost': $counts['totalSaleLost']++; break;
        case 'Delayed': $counts['totalDelayed']++; break;
        case 'Not Interested': $counts['totalNotInterested']++; break;
        case 'Ready to Start (Project Initiation)': $counts['totalReadyToStart']++; break;
        case 'Technical Review (For Custom Websites)': $counts['totalTechnicalReview']++; break;
        case 'Customer Onboarding': $counts['totalCustomerOnboarding']++; break;
        case 'Payment Received': $counts['totalPaymentReceived']++; break;
        case 'Website Launched': $counts['totalWebsiteLaunched']++; break;
        case 'Customer Feedback': $counts['totalCustomerFeedback']++; break;
        default: break;
    }

    return $counts;
}



    // User information retrieval
    public static function getUserInfo()
    {
        $user = Auth::user();
        return [
            'userID' => $user->id,
            'roleId' => $user->role_id,
            'userName' => $user->name,
        ];
    }

   
}

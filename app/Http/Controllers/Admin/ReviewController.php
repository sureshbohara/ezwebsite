<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReviewRepository;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Review;

class ReviewController extends Controller
{
    protected ReviewRepository $repository;

    // Dependency injection for the repository and middleware
    public function __construct(ReviewRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-review')->only('index');
        $this->middleware('can:add-review')->only(['create', 'store']);
        $this->middleware('can:edit-review')->only(['edit', 'update', 'reviewStatus', 'updateOrderLevel']);
        $this->middleware('can:delete-review')->only('destroy');
    }

    // Display the list of reviews (paginated)
    public function index()
    {
        $datas = Review::getRecords();
        return view(' admin.review.index', compact('datas'));
    }

    // Store a new review
    public function store(ReviewRequest $request){
        try {
            // Create the review and handle the response
            $this->repository->createData($request);
            return response()->json(['status' => 200, 'msg' => 'Review created successfully.']);
        } catch (Exception $e) {
            // Log and return an error response
            Log::error('Error creating review: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create review: ' . $e->getMessage()]);
        }
    }

    // Update an existing review
    public function update(ReviewRequest $request, Review $review)
    {
        try {
            // Update the review using the repository
            $this->repository->updateData($review, $request);
            // Redirect with success message
            return redirect()->route('review.index')->with('success', 'Review updated successfully.');
        } catch (Exception $e) {
            // Log and redirect with error message
            Log::error('Error updating review: ' . $e->getMessage());
            return redirect()->route('review.index')->with('error', 'Failed to update review: ' . $e->getMessage());
        }
    }

    // Change the status of a review (approve, reject, etc.)
    public function reviewStatus(Request $request)
    {
        try {
            $review = $this->repository->find($request->status_id);
            $review->toggleStatus(); // Assuming you have this method implemented in the Review model
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update review status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status: ' . $e->getMessage()]);
        }
    }

    // Delete a review by its ID
    public function destroy(Request $request, int $id)
    {
        try {
            $review = $this->repository->find($id);
            $this->repository->delete($review);
            return redirect()->route('review.index')->with('success', 'Review deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete review: " . $e->getMessage());
            return redirect()->route('review.index')->with('error', 'Failed to delete review: ' . $e->getMessage());
        }
    }

    // Update the order level of a review
    public function updateOrderLevel(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);

        // Find and update the order level
        try {
            $review = Review::findOrFail($validated['id']);
            $review->order_level = $validated['order_level'] ?? $review->order_level;
            $review->save();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Log::error("Failed to update order level: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update order level: ' . $e->getMessage()]);
        }
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Banner;

class BannerController extends Controller
{
    protected $repository;

    // Inject BannerRepository and apply middleware
    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-banner')->only('index');
        $this->middleware('can:add-banner')->only(['create', 'store']);
        $this->middleware('can:edit-banner')->only(['edit', 'update', 'bannerStatus']);
        $this->middleware('can:delete-banner')->only('destroy');
    }

    // Display a listing of banners
    public function index(){
        $datas = Banner::getRecords();
        return view('admin.banner.index', compact('datas'));
    }

    // Store a newly created banner
    public function store(BannerRequest $request){
        try {
            $banner = $this->repository->createData($request);
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating banner: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create data.']);
        }
    }

    // Update an existing banner
    public function update(BannerRequest $request, Banner $banner)
    {
        try {
            $this->repository->updateData($banner, $request);
            return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating banner: ' . $e->getMessage());
            return redirect()->route('banner.index')->with('error', 'Banner update failed.');
        }
    }

    // Toggle the status of a banner
    public function bannerStatus(Request $request)
    {
        try {
            $banner = $this->repository->find($request->status_id);
            $banner->toggleStatus(); // Assuming this method exists for toggling
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error('Error changing banner status: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }

    // Delete a banner
    public function destroy(Banner $banner){
        try {
            $this->repository->delete($banner);
            return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting banner: ' . $e->getMessage());
            return redirect()->route('banner.index')->with('error', 'Failed to delete banner.');
        }
    }
}
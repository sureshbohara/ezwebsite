<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Models\Service;
class ServiceController extends Controller
{
    protected $repository;
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-service')->only('index');
        $this->middleware('can:add-service')->only(['create', 'store']);
        $this->middleware('can:edit-service')->only(['edit', 'update', 'serviceStatus']);
        $this->middleware('can:delete-service')->only('destroy');
    }

  
    public function index(){
        $datas = Service::getRecords();
        return view('admin.service.index', compact('datas'));
    }

  
    public function create(){
        return view('admin.service.create');
    }

    public function store(ServiceRequest $request){
        try {
             $this->repository->createData($request);  
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating data: ' . $e->getMessage());
           return response()->json(['status' => 500, 'msg' => 'Failed to create data.']);
        }
    }

     public function edit(Service $service){
       $data = $service;
       $selectedData = json_decode($data->whyChoose_ids, true) ?? [];
      return view('admin.service.edit', compact('data','selectedData'));
    }

    
     public function update(ServiceRequest $request, Service $service){
        try {
             $service = $this->repository->updateData($service, $request);
            return response()->json(['status' => 200, 'msg' => 'Data updated successfully.']);
        } catch (Exception $e) {
            Log::error('Error updating data: ' . $e->getMessage());
            return response()->json(['status' => 500, 'error' => 'Failed to create data.']);
        }
    }

    public function serviceStatus(Request $request){
        try {
            $data = $this->repository->find($request->status_id);
            $data->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update data status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }

  
    public function destroy(Request $request, int $id){
        try {
            $data = $this->repository->find($id);
            $this->repository->delete($data);
            return redirect()->route('service.index')->with('success', 'Data deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete data: " . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'Failed to delete data.');
        }
    }

    public function updateOrderLevel(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);
        $service = Service::findOrFail($validated['id']);
        $service->order_level = $validated['order_level'] ?? $service->order_level;
        $service->save();
        return response()->json(['success' => true]);
    }

     public function updateSlugs(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'slug' => 'nullable',
        ]);
        $serviceSlug = Service::findOrFail($validated['id']);
        $serviceSlug->slug = $validated['slug'] ?? $serviceSlug->slug;
        $serviceSlug->save();
        return response()->json(['success' => true]);
    }


    public function updateType(Request $request){
    $validated = $request->validate([
        'id' => 'required|integer',
        'display_on' => 'nullable|string', 
    ]);
    $serviceType = Service::findOrFail($validated['id']);
    $serviceType->display_on = $validated['display_on'] ?? $serviceType->display_on;
    $serviceType->save();
    return response()->json(['success' => true]);
 }

    
}

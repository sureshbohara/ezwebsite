<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PlansRepository;
use App\Http\Requests\PlansRequest;
use App\Models\Plans;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class PlansController extends Controller
{
    protected $repository;

    public function __construct(PlansRepository $repository){
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-package')->only('index');
        $this->middleware('can:add-package')->only(['create', 'store']);
        $this->middleware('can:edit-package')->only(['edit', 'update', 'packageStatus']);
        $this->middleware('can:delete-package')->only('destroy');
    }

    public function index(){
        $datas = Plans::getRecords();
        return view('admin.plans.index', compact('datas'));
    }

    public function store(PlansRequest $request){
        try {
            $this->repository->createData($request);
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating plan: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create plan.']);
        }
    }

   

      public function edit($id){
        $data['plans'] = $this->repository->find($id);
        return view('admin.plans.edit',$data);
    }

     public function update(PlansRequest $request, $id){
        try {
            $this->repository->updateData($request, $id);
            return response()->json(['status' => 200, 'msg' => 'Data updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'msg' => 'Failed to update Data.']);
        }
    }





     public function destroy($id){
        try {
            $this->repository->delete($id);
           return redirect()->route('package.index')->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            Log::error("Failed to delete data: " . $e->getMessage());
            return redirect()->route('package.index')->with('error', 'Failed to delete data.');
        }
    }


    public function packageStatus(Request $request){
        try {
            $data = $this->repository->find($request->status_id);
            $data->toggleStatus(); 
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update data status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status: ' . $e->getMessage()]);
        }
    }


    public function updateOrderLevel(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);

        $plan = Plans::findOrFail($validated['id']);
        $plan->order_level = $validated['order_level'] ?? $plan->order_level;
        $plan->save();

        return response()->json(['success' => true]);
    }
}

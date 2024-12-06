<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Permission;

class PermissionController extends Controller
{
    protected $repository;
    public function __construct(PermissionRepository $repository){
        $this->repository = $repository;
        $this->middleware('admin');
    }

    // Display permissions list
    public function index(){
        $this->authorize('view-permission');
        $data['datas'] = Permission::with('role')->paginate(10);
        return view('admin.permission.index', $data);
    }

    // Store new permissions
    public function store(PermissionRequest $request){
        $this->authorize('add-permission');
        try {
            $permission = $this->repository->store($request->validated());
            return response()->json(['status' => 200, 'msg' => 'Permission created successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to create permission: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create permission.']);
        }
    }

     public function edit(Permission $permission){
        $this->authorize('edit-permission');
        return view('admin.permission.edit', compact('permission'));
    }

    // Update existing permissions
    public function update(PermissionRequest $request, $id){
        $this->authorize('edit-permission');
        try {
            $permission = $this->repository->find($id);
            $this->repository->update($permission, $request->validated());
            $request->session()->flash('success', 'Data updated successfully');
            return redirect()->route('permission.index');
        } catch (Exception $e) {
            Log::error("Failed to update permission: " . $e->getMessage());
            $request->session()->flash('error', 'Failed to update data');
            return redirect()->back();
        }
    }

    // Delete permissions
    public function destroy(Request $request, $id){
        $this->authorize('delete-permission');
        try {
            $permission = $this->repository->find($id);
            $this->repository->delete($permission);
            $request->session()->flash('success', 'Data deleted successfully');
            return back();
        } catch (Exception $e) {
            Log::error("Failed to delete permission: " . $e->getMessage());
            $request->session()->flash('error', 'Failed to delete data');
            return back();
        }
    }
}

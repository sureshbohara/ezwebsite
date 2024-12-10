<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
        $this->middleware('admin');
    }

    public function index(){
        $this->authorize('view-user');
        $data['datas'] = User::with('role')->paginate(10);
        return view('admin.users.index', $data);
    }

    public function store(UserRequest $request){
        $this->authorize('add-user');
        try {
            $admin = $this->repository->store($request);
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to create admin: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create admin.']);
        }
    }

    public function update(UserRequest $request, $id){
        $this->authorize('edit-user');
        try {
            $admin = $this->repository->find($id);
            $this->repository->update($admin, $request);
            $request->session()->flash('success', 'Data updated successfully');
            return redirect()->back();
        } catch (Exception $e) {
            Log::error("Failed to update admin: " . $e->getMessage());
            $request->session()->flash('error', 'Failed to update data');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id){
        $this->authorize('delete-user');
        try {
            $admin = $this->repository->find($id);
            $this->repository->delete($admin);
            $request->session()->flash('success', 'Data deleted successfully');
            return back();
        } catch (Exception $e) {
            Log::error("Failed to delete admin: " . $e->getMessage());
            $request->session()->flash('error', 'Failed to delete data');
            return back();
        }
    }

    public function usersStatus(Request $request){
        $this->authorize('edit-user');
        try {
            $admin = $this->repository->find($request->status_id);
            $admin->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }
}

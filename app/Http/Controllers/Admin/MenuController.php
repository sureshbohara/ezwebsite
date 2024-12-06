<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    protected $repository;

 
    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-menu')->only('index');
        $this->middleware('can:add-menu')->only(['create', 'store']);
        $this->middleware('can:edit-menu')->only(['edit', 'update', 'menuStatus']);
        $this->middleware('can:delete-menu')->only('destroy');
    }


    public function index(){
        $datas = Menu::getRecords();
         // dd($datas->toJson());
        return view('admin.menu.index', compact('datas'));
    }

    
    public function store(MenuRequest $request){
        try {
            $data = $this->repository->create($request->validated());
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating data: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create data.']);
        }
    }

 
    public function update(MenuRequest $request, Menu $menu){
        try {
            $this->repository->update($menu, $request->validated());
            return redirect()->route('menu.index')->with('success', 'data updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating data: ' . $e->getMessage());
            return redirect()->route('menu.index')->with('error', 'Failed to update data.');
        }
    }

 
    public function menuStatus(Request $request){
        try {
            $menu = $this->repository->find($request->status_id);
            $menu->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update data status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }


    public function destroy(Request $request, int $id){
        try {
            $menu = $this->repository->find($id);
            $this->repository->delete($menu);
            return redirect()->route('menu.index')->with('success', 'data deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete data: " . $e->getMessage());
            return redirect()->route('menu.index')->with('error', 'Failed to delete data.');
        }
    }

   
    public function updateOrderLevel(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);
        $menu = Menu::findOrFail($validated['id']);
        $menu->order_level = $validated['order_level'] ?? $menu->order_level;
        $menu->save();
        return response()->json(['success' => true]);
    }


   public function updateMenuType(Request $request){
    $validated = $request->validate([
        'id' => 'required|integer',
        'display_on' => 'nullable|string', 
    ]);
    $menuType = Menu::findOrFail($validated['id']);
    $menuType->display_on = $validated['display_on'] ?? $menuType->display_on;
    $menuType->save();
    return response()->json(['success' => true]);
 }

 public function updateMenuCms(Request $request){
    $validated = $request->validate([
        'id' => 'required|integer',
        'is_cms_page' => 'nullable|string', 
    ]);
    $iscmsPage = Menu::findOrFail($validated['id']);
    $iscmsPage->is_cms_page = $validated['is_cms_page'] ?? $iscmsPage->is_cms_page;
    $iscmsPage->save();
    return response()->json(['success' => true]);
 }



    
    
}

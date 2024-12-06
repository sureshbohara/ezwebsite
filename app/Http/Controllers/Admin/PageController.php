<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Page;

class PageController extends Controller
{
    protected $repository;
    
    public function __construct(PageRepository $repository){
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-page')->only('index');
        $this->middleware('can:add-page')->only(['create', 'store']);
        $this->middleware('can:edit-page')->only(['edit', 'update', 'serviceStatus']);
        $this->middleware('can:delete-page')->only('destroy');
    }

    public function index(){
        $datas = Page::getRecords();
        return view('admin.page.index', compact('datas'));
    }

    public function create(){
        return view('admin.page.create');
    }

    public function store(PageRequest $request){
        try {
            $this->repository->createData($request);
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating page: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create data.']);
        }
    }

    public function edit(Page $page){
        $data = $page;
        return view('admin.page.edit', compact('data'));
    }

    public function update(PageRequest $request, Page $page){
        try {
            $this->repository->updateData($page, $request);
            return response()->json(['status' => 200, 'msg' => 'Data updated successfully.']);
        } catch (Exception $e) {
            Log::error('Error updating page: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update data.']);
        }
    }

    public function pageStatus(Request $request){
        try {
            $data = $this->repository->find($request->status_id);
            $data->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update page status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }

    public function destroy(Request $request, int $id){
        try {
            $data = $this->repository->find($id);
            $this->repository->delete($data);
            return redirect()->route('page.index')->with('success', 'Data deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete page: " . $e->getMessage());
            return redirect()->route('page.index')->with('error', 'Failed to delete page.');
        }
    }

    public function updateOrderLevel(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);

        $page = Page::findOrFail($validated['id']);
        $page->order_level = $validated['order_level'] ?? $page->order_level;
        $page->save();
        return response()->json(['success' => true]);
    }


     public function updateSlugs(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'slug' => 'nullable',
        ]);
        $pageSlug = Page::findOrFail($validated['id']);
        $pageSlug->slug = $validated['slug'] ?? $pageSlug->slug;
        $pageSlug->save();
        return response()->json(['success' => true]);
    }

    
    public function updatePageType(Request $request){
    $validated = $request->validate([
        'id' => 'required|integer',
        'template' => 'nullable', 
    ]);
    $templateType = Page::findOrFail($validated['id']);
    $templateType->template = $validated['template'] ?? $templateType->template;
    $templateType->save();
    return response()->json(['success' => true]);
 }



}

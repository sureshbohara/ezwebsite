<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\FaqsRepository;
use App\Http\Requests\FaqsRequest;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class FaqsController extends Controller
{
    protected $repository;

 
    public function __construct(FaqsRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-faqs')->only('index');
        $this->middleware('can:add-faqs')->only(['create', 'store']);
        $this->middleware('can:edit-faqs')->only(['edit', 'update', 'faqsStatus']);
        $this->middleware('can:delete-faqs')->only('destroy');
    }


    public function index(){
        $datas = Faqs::getRecords();
        return view('admin.faqs.index', compact('datas'));
    }

    
    public function store(FaqsRequest $request){
        try {
            $data = $this->repository->create($request->validated());
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating FAQ: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create FAQ.']);
        }
    }

 
    public function update(FaqsRequest $request, Faqs $faq){
        try {
            $this->repository->update($faq, $request->validated());
            return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating FAQ: ' . $e->getMessage());
            return redirect()->route('faqs.index')->with('error', 'Failed to update FAQ.');
        }
    }

 
    public function faqsStatus(Request $request){
        try {
            $faq = $this->repository->find($request->status_id);
            $faq->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update FAQ status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update status.']);
        }
    }


    public function destroy(Request $request, int $id){
        try {
            $faq = $this->repository->find($id);
            $this->repository->delete($faq);
            return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete FAQ: " . $e->getMessage());
            return redirect()->route('faqs.index')->with('error', 'Failed to delete FAQ.');
        }
    }

   
    public function updateOrderLevel(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);
        $faq = Faqs::findOrFail($validated['id']);
        $faq->order_level = $validated['order_level'] ?? $faq->order_level;
        $faq->save();
        return response()->json(['success' => true]);
    }
    
}

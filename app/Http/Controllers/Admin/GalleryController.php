<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GalleryRepository;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Gallery;

class GalleryController extends Controller
{
    protected GalleryRepository $repository;

    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        $this->middleware('can:view-gallery ')->only('index');
        $this->middleware('can:add-gallery ')->only(['create', 'store']);
        $this->middleware('can:edit-gallery ')->only(['edit', 'update', 'galleryStatus']);
        $this->middleware('can:delete-gallery ')->only('destroy');
    }

    public function index() {
        $datas = Gallery::getRecords();
        return view('admin.gallery.index', compact('datas'));
    }

    public function store(GalleryRequest $request)
    {
        try {
            $this->repository->createGallery($request);
            return response()->json(['status' => 200, 'msg' => 'Gallery created successfully.']);
        } catch (Exception $e) {
            Log::error('Error creating data: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to create data: ' . $e->getMessage()]);
        }
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        try {
            $this->repository->updateGallery($gallery, $request);
            return redirect()->route('gallery.index')->with('success', 'Data updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating gallery: ' . $e->getMessage());
            return redirect()->route('gallery.index')->with('error', 'Failed to update data: ' . $e->getMessage());
        }
    }

    public function galleryStatus(Request $request)
    {
        try {
            $gallery = $this->repository->findGallery($request->status_id);
            $gallery->toggleStatus();
            return response()->json(['status' => 200, 'msg' => 'Status updated successfully.']);
        } catch (Exception $e) {
            Log::error("Failed to update data status: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update data status: ' . $e->getMessage()]);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $gallery = $this->repository->findGallery($id);
            $this->repository->deleteGallery($gallery);
            return redirect()->route('gallery.index')->with('success', 'Data deleted successfully.');
        } catch (Exception $e) {
            Log::error("Failed to delete gallery: " . $e->getMessage());
            return redirect()->route('gallery.index')->with('error', 'Failed to delete gallery: ' . $e->getMessage());
        }
    }

    public function updateOrderLevel(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'order_level' => 'nullable|numeric',
        ]);

        try {
            $gallery = Gallery::findOrFail($validated['id']);
            $gallery->order_level = $validated['order_level'] ?? $gallery->order_level;
            $gallery->save();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Log::error("Failed to update order level: " . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update order level: ' . $e->getMessage()]);
        }
    }
}
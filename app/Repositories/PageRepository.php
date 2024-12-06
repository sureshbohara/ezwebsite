<?php

namespace App\Repositories;

use App\Models\Page;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\PageRequest;

class PageRepository
{
    protected $imageHelper;

    public function __construct(ImageHelper $imageHelper){
        $this->imageHelper = $imageHelper;
    }

    public function createData(PageRequest $request){
        try {
            $data = $request->validated(); 
            $this->handleImage(null, $data, $request);
            $this->setDefaultMetaFields($data);
            $this->handleList($data);
            $page = Page::create($data);
            return $page;
        } catch (Exception $e) {
            Log::error("Error creating page: " . $e->getMessage());
            throw new Exception("Failed to create page.");
        }
    }

    public function updateData(Page $page, PageRequest $request){
        try {
            $data = $request->validated();
            $this->handleImage($page, $data, $request, true);
            $this->setDefaultMetaFields($data);
            $this->handleList($data);
            $page->update($data);
            return $page;
        } catch (Exception $e) {
            Log::error("Error updating page: " . $e->getMessage());
            throw new Exception("Failed to update page.");
        }
    }

    public function delete(Page $page){
        try {
            $this->imageHelper->handleDeletedImage($page, 'image', 'images/');
            $page->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete page: " . $e->getMessage());
            throw new Exception("Failed to delete page.");
        }
    }

    public function find(int $id){
        return Page::findOrFail($id);
    }

    private function setDefaultMetaFields(array &$data){
        $data['meta_keywords'] = $data['meta_keywords'] ?? $data['name'];
        $data['meta_description'] = $data['meta_description'] ?? $data['excerpt'];
    }

    private function handleList(array &$data){
        if (isset($data['page_list'])) {
            $data['page_list'] = array_map('trim', $data['page_list']);
        }
    }

    private function handleImage(Page $page = null, array &$data, PageRequest $request, $update = false){
        if ($request->hasFile('image')) {
            if ($page && $update) {
                $this->imageHelper->handleDeletedImage($page, 'image', 'images/');
            }
            $data['image'] = $this->imageHelper->handleUploadedImage($request->file('image'), 'images');
        }
    }
}

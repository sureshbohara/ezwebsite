<?php

namespace App\Repositories;
use App\Models\Faqs;
use Illuminate\Support\Facades\Log;
use Exception;
class FaqsRepository
{
    
    public function create(array $data): Faqs
    {
        try {
            $faq = new Faqs($data);
            $faq->save();
            return $faq;
        } catch (Exception $e) {
            Log::error("Error creating FAQ: " . $e->getMessage());
            throw new Exception("Failed to create FAQ.");
        }
    }


    public function update(Faqs $faq, array $data): Faqs
    {
        try {
            $faq->update($data);
            return $faq;
        } catch (Exception $e) {
            Log::error("Error updating FAQ with ID {$faq->id}: " . $e->getMessage());
            throw new Exception("Failed to update FAQ.");
        }
    }

 
    public function delete(Faqs $faq): void
    {
        try {
            $faq->delete();
        } catch (Exception $e) {
            Log::error("Failed to delete FAQ with ID {$faq->id}: " . $e->getMessage());
            throw new Exception("Failed to delete FAQ.");
        }
    }


    public function find(int $id): Faqs
    {
        try {
            return Faqs::findOrFail($id);
        } catch (Exception $e) {
            Log::error("Failed to find FAQ with ID {$id}: " . $e->getMessage());
            throw new Exception("FAQ not found.");
        }
    }
    
}

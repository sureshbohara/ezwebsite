<?php

namespace App\Repositories;
use App\Models\Business;
use App\Http\Requests\BusinessRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Auth;

class BusinessRepository
{
    // Get all businesses based on current user role and filters
    public function getAll(){
        return Business::getRecords();
    }

    // Store a new business and create an associated comment
    public function store(BusinessRequest $request){
        try {
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->user()->id;
            $business = Business::create($validatedData);
            // Creating a comment after business creation
            $business->comments()->create([
                'businesses_id' => $business->id,
                'name' => auth()->user()->name,
                'comments' => 'Created New Business Information',
            ]);

            return $business;
        } catch (\Exception $e) {
            Log::error('Failed to create data: ' . $e->getMessage());
            throw new \Exception('Failed to create data.');
        }
    }

    // Update an existing business record
    public function update(BusinessRequest $request, $id){
        try {
            $data = Business::findOrFail($id);
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->user()->id;
            $data->update($validatedData);
            return $data;
        } catch (ModelNotFoundException $e) {
            Log::error('Business not found: ' . $e->getMessage());
            throw new \Exception('Business not found.');
        } catch (\Exception $e) {
            Log::error('Failed to update data: ' . $e->getMessage());
            throw new \Exception('Failed to update data.');
        }
    }

    // Delete a business record
    public function delete($id){
        try {
            $data = Business::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            Log::error('Business not found: ' . $e->getMessage());
            throw new \Exception('Business not found.');
        } catch (\Exception $e) {
            Log::error('Failed to delete data: ' . $e->getMessage());
            throw new \Exception('Failed to delete data.');
        }
    }

    // Find a specific business record by its ID
    public function find($id){
        try {
            return Business::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error('Business not found: ' . $e->getMessage());
            throw new \Exception('Business not found.');
        }
    }
}

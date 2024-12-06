<?php

namespace App\Repositories;
use App\Models\Plans;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\PlansRequest;
class PlansRepository
{

    public function createData(PlansRequest $request){
        try {
            $data = $request->validated(); 
            $this->handleList($data);
            $plans = Plans::create($data);
            return $plans;
        } catch (Exception $e) {
            Log::error("Error creating data: " . $e->getMessage());
            throw new Exception("Failed to create data.");
        }
    }



   public function updateData(PlansRequest $request, $id){
    try {
        $data = Plans::findOrFail($id);
        $validatedData = $request->validated();
        $this->handleList($validatedData);
        $data->update($validatedData);
        return $data;
    } catch (\Exception $e) {
        Log::error('Failed to update data: ' . $e->getMessage());
        throw new \Exception('Failed to update data.');
    }
}

   


     public function delete($id){
        try {
            $data = Plans::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            Log::error('data not found: ' . $e->getMessage());
            throw new \Exception('data not found.');
        } catch (\Exception $e) {
            Log::error('Failed to delete data: ' . $e->getMessage());
            throw new \Exception('Failed to delete data.');
        }
    }



    public function find(int $id){
        return Plans::findOrFail($id);
    }

    private function handleList(array &$data){
        if (isset($data['package_feature'])) {
            $data['package_feature'] = array_map('trim', $data['package_feature']);
        }
    }
}

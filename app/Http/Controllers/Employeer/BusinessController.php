<?php

namespace App\Http\Controllers\Employeer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BusinessRepository;
use App\Http\Requests\BusinessRequest;
use App\Models\Business;

class BusinessController extends Controller
{
    protected $repository;

    public function __construct(BusinessRepository $repository){
        $this->repository = $repository;
        $this->middleware('employee');
    }

    public function index(Request $request){
        $data['datas'] = $this->repository->getAll();
        return view('employee.business.index', $data);
    }

    public function create(){
        return view('employee.business.form');
    }

    public function store(BusinessRequest $request){
        try {
            $business = $this->repository->store($request);
            return response()->json(['status' => 200, 'msg' => 'Data created successfully.', 'data' => $business]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'msg' => 'Failed to create data.']);
        }
    }

    public function edit($id){
        $data['data'] = $this->repository->find($id);
        return view('employee.business.edit', $data);
    }

    public function update(BusinessRequest $request, $id){
        try {
            $business = $this->repository->update($request, $id);
            return redirect()->route('business.index')->with('success', 'Business updated successfully.');
        } catch (\Exception $e) {
             return redirect()->route('business.index')->with('error', 'Failed to update data.');
        }
    }

    public function destroy($id){
        try {
            $this->repository->delete($id);
            return back()->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete data.');
        }
    }

    
}

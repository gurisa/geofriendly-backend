<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Acquisition;

class AcquisitionController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all acquisitions', 
            'code' => 200,
            'data'=> Acquisition::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Acquisition::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new acquisition', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new acquisition', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Acquisition::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve acquisition', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Acquisition not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
        ]);
        $data = $request->all();
        if ($id && $data = Acquisition::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update acquisition',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update acquisition', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Acquisition::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete acquisition',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete acquisition', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Acquisition not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

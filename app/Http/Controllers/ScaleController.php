<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Scale;

class ScaleController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all scales', 
            'code' => 200,
            'data'=> Scale::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
            'amount' => 'required|integer|size:10',
        ]);

        $data = $request->all();
        if ($data = Scale::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new scale', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new scale', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Scale::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve scale', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Scale not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
            'amount' => 'required|integer|size:10',
        ]);
        $data = $request->all();
        if ($id && $data = Scale::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update scale',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update scale', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Scale::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete scale',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete scale', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Scale not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

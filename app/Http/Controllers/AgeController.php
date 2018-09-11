<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Age;

class AgeController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all ages', 
            'code' => 200,
            'data'=> Age::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Age::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new age', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new age', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Age::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve age', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Age not found',
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
        if ($id && $data = Age::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update age',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update age', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Age::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete age',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete age', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Age not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

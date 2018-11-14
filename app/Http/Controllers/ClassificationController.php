<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all classifications', 
            'code' => 200,
            'data'=> Classification::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'id' => 'required|string|min:1|max:10|unique:classification,id',
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Classification::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new classification', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new classification', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Classification::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve classification', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Classification not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
        ]);
        $data = $request->all();
        if ($id && $data = Classification::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update classification',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update classification', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Classification::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete classification',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete classification', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Classification not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

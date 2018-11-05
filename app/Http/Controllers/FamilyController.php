<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all families', 
            'code' => 200,
            'data'=> Family::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'id' => 'required|string|min:4|max:10|unique:family,id',
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
            'classification_id' => 'required|exists:classification,id',
        ]);

        $data = $request->all();
        if ($data = Family::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new family',
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new family', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Family::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve family', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Family not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
            'classification_id' => 'required|exists:classification,id',
        ]);
        $data = $request->all();
        if ($id && $data = Family::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update family',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update family', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Family::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete family',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete family', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Family not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

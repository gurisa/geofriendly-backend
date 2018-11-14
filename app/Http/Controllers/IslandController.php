<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Island;

class IslandController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all islands', 
            'code' => 200,
            'data'=> Island::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'id' => 'required|string|min:1|max:20|unique:island,id',
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Island::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new island', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new island', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Island::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve island', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Island not found',
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
        if ($id && $data = Island::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update island',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update island', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Island::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete island',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete island', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Island not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

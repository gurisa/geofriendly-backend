<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all types', 
            'code' => 200,
            'data'=> Type::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Type::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new type', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new type', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Type::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve type', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Type not found',
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
        if ($id && $data = Type::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update type',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update type', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Type::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete type',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete type', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Type not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

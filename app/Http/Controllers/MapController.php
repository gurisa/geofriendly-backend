<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Map;

class MapController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all maps', 
            'code' => 200,
            'data'=> Map::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'code' => 'required|string|min:1|max:20',
            'name' => 'required|string|min:4|max:50',
            'island_id' => 'required|exists:island,id',
            'scale_id' => 'required|exists:scale,id',
            'type_id' => 'required|exists:type,id',
        ]);

        $data = $request->all();
        if ($data = Map::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new map', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new map', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Map::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve map', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Map not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [            
            'code' => 'required|string|min:1|max:20',
            'name' => 'required|string|min:4|max:50',
            'island_id' => 'required|exists:island,id',
            'scale_id' => 'required|exists:scale,id',
            'type_id' => 'required|exists:type,id',
        ]);
        $data = $request->all();
        if ($id && $data = Map::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update map',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update map', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Map::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete map',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete map', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Map not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

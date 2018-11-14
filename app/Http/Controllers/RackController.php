<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rack;

class RackController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all racks', 
            'code' => 200,
            'data'=> Rack::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'string|min:4|max:200',
        ]);

        $data = $request->all();
        if ($data = Rack::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new rack', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new rack', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Rack::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve rack', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Rack not found',
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
        if ($id && $data = Rack::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update rack',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update rack', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Rack::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete rack',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete rack', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Rack not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

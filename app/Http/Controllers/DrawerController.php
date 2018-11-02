<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drawer;

class DrawerController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all drawers', 
            'code' => 200,
            'data'=> Drawer::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
            'rack_id' => 'required|exists:rack,id',
        ]);

        $data = $request->all();
        if ($data = Drawer::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new drawer', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new drawer', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Drawer::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve drawer', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Drawer not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:200',
            'rack_id' => 'required|exists:rack,id',
        ]);
        $data = $request->all();
        if ($id && $data = Drawer::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update drawer',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update drawer', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Drawer::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete drawer',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete drawer', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Drawer not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

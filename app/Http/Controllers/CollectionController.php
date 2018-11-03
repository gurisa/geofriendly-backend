<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller {

    protected $rule = [
        'registration' => 'required|unique:collection,registration',
        'inventory' => 'required|unique:collection,inventory',
        'code' => 'required|string|min:4|max:100',
        'name' => 'required|string|min:4|max:200',

        'synonym' => 'string|min:4|max:200',
        'amount' => 'int|size:10',
        'founder' => 'string|min:4|max:100',
        'collector' => 'string|min:4|max:100',
        'location' => 'string|min:4|max:200',
        'coordinate' => 'string|min:4|max:200',
        'formation' => 'string|min:4|max:200',
        'determination' => 'string|min:4|max:200',
        'redetermination' => 'string|min:4|max:200',
        'type' => 'string|min:4|max:200',

        'width' => 'numeric', 'height' => 'numeric', 'weight' => 'numeric', 'high' => 'numeric',

        'environment' => 'string|min:4|max:200',
        'reference' => 'string|min:4|max:200',
        'description' => 'string|min:4|max:200',
        'photo' => 'string|min:4|max:200',

        'family_id' => 'required|exists:family,id',
        'age_id' => 'required|exists:age,id',
        'drawer_id' => 'required|exists:drawer,id',
        'map_id' => 'required|exists:map,id',
        'acquisition_id' => 'required|exists:acquisition,id',
        'user_id' => 'required|exists:user,id',
        'taken_at' => 'date_format:yyyy-mm-dd'
    ];

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all collections', 
            'code' => 200,
            'data'=> Collection::all()
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, $this->rule);

        $data = $request->all();
        if ($data = Collection::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new collection', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new collection', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function retrieve($id) {
        if ($id && $data = Collection::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve collection', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Collection not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, $this->rule);
        $data = $request->all();
        if ($id && $data = Collection::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update collection',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update collection', 
            'code' => 500,
            'data'=> []
        ]);
    }

    public function delete($id) {
        if ($id) {
            if ($data = Collection::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete collection',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete collection', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Collection not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

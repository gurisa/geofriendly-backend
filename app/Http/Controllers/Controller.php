<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {
    
    public function index() {
        return response()->json([
            'status' => true, 
            'message' => 'Hey world!', 
            'code' => 200, 
            'data'=> []
        ], 200);
    }
    
}

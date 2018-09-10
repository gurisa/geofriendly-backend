<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {
    
    public function index() {
        return ['status' => true, 'message' => 'Hey world!', 'data'=> []];
    }
}

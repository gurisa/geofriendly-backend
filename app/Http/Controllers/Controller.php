<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(
 * title="GeoFriendly Endpoint", 
 * version="1.0.0",
 * description="Geological stuffs",
 *  @OA\Contact(
 *   email="admin@gurisa.com"
 *  )
 * ),
 * @OA\Server(
 *  description="Endpoint",
 *  url=API_HOST
 * ),
 * @OA\ExternalDocumentation(
 *  description="More stuffs",
 *  url="https://gurisa.com"
 * )
 */

class Controller extends BaseController {
    
    
    /**
     * @OA\Get(
     *  path="/",
     *  tags={"Test"},
     *  @OA\Response(
     *   response="200", 
     *   description="Test"
     *  )
     * )
    */
    public function index() {
        return response()->json([
            'status' => true, 
            'message' => 'Hey world!', 
            'code' => 200, 
            'data'=> []
        ], 200);
    }

}

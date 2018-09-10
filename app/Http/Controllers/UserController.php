<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserController extends Controller {

    public function __construct() {
        
    }

    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all users', 
            'data'=> User::all()
        ]);
    }

    public function create() {

    }

    public function retrieve() {

    }

    public function update() {

    }

    public function delete() {

    }
}

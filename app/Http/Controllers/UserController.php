<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {

    public function __construct() {
        
    }

    /**
     * @OA\Get(
     *   path="/users",
     *   description="Retrieve all users",
     *   tags={"User"},
     *   @OA\Parameter(
     *         description="JWT Token", in="query", name="token", required=true,
     *         @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Users data",
     *      @OA\JsonContent(
     *        @OA\Property(property="status", type="boolean"),
     *        @OA\Property(property="message", type="string"),
     *        @OA\Property(property="code", type="integer"),
     *        @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     *      )
     *   )
     * )
     */
    public function all() {
        return response()->json([
            'status' => true, 
            'message' => 'Success retrieve all users', 
            'code' => 200,
            'data'=> User::all()
        ]);
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     description="Creates new user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         description="JWT Token", in="query", name="token", required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         description="User data", required=true,
     *         @OA\MediaType(mediaType="multipart/form-data", @OA\Schema(ref="#/components/schemas/UserNew"))
     *     ),
     *     @OA\Response(
     *        response=200,
     *        description="User data",
     *        @OA\JsonContent(
     *         @OA\Property(property="status", type="boolean"),
     *         @OA\Property(property="message", type="string"),
     *         @OA\Property(property="code", type="integer"),
     *         @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     *        )
     *     )
     * )
     */
    public function create(Request $request) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'username' => 'required|string|min:6|max:15|regex:/^[A-Za-z0-9]+$/|unique:user',
            'password' => 'required|string|between:6,20',
        ]);

        $data = $request->all();
        if ($data = User::store($data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success add new user', 
                'code' => 201,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'Failed to add new user', 
            'code' => 500,
            'data'=> []
        ]);
    }

     /**
     * @OA\Get(
     *     path="/users/{id}",
     *     description="Retrieve user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         description="User ID", in="path", name="id", required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Parameter(
     *         description="JWT Token", in="query", name="token", required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User data",
     *         @OA\JsonContent(
     *          @OA\Property(property="status", type="boolean"),
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="code", type="integer"),
     *          @OA\Property(property="data", ref="#/components/schemas/User")
     *        )
     *     )
     * )
     */
    public function retrieve($id) {
        if ($id && $data = User::find($id)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success retrieve user', 
                'code' => 200,
                'data'=> $data
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'User not found',
            'code' => 404, 
            'data'=> []
        ]);
    }

     /**
     * @OA\Patch(
     *     path="/users/{id}",
     *     description="Update new user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         description="User ID", in="path", name="id", required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Parameter(
     *         description="JWT Token", in="query", name="token", required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         description="User data", required=true,
     *         @OA\MediaType(mediaType="multipart/form-data", @OA\Schema(ref="#/components/schemas/UserNew"))
     *     ),
     *     @OA\Response(
     *        response=200,
     *        description="User data",
     *        @OA\JsonContent(
     *         @OA\Property(property="status", type="boolean"),
     *         @OA\Property(property="message", type="string"),
     *         @OA\Property(property="code", type="integer"),
     *         @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     *        )
     *     )
     * )
     */
    public function update(Request $request, $id) {
        $this->validate($request, [            
            'name' => 'required|string|min:4|max:50',
            'password' => 'required|string|between:6,20',
        ]);
        $data = $request->all();
        if ($id && $data = User::change($id, $data)) {
            return response()->json([
                'status' => true, 
                'message' => 'Success update user',
                'code' => 200, 
                'data'=> $data
            ]);
        }
        return response()->json([            
            'status' => false, 
            'message' => 'Failed update user', 
            'code' => 500,
            'data'=> []
        ]);
    }

     /**
     * @OA\Delete(
     *     path="/users/{id}",
     *     description="Delete user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         description="User ID", in="path", name="id", required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Parameter(
     *         description="JWT Token", in="query", name="token", required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User deletion status",
     *         @OA\JsonContent(
     *          @OA\Property(property="status", type="boolean"),
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="code", type="integer"),
     *          @OA\Property(property="data", type="array", items="[]")
     *        )
     *     )
     * )
     */
    public function delete($id) {
        if ($id) {
            if ($data = User::erase($id)) {
                return response()->json([
                    'status' => true, 
                    'message' => 'Success delete user',
                    'code' => 200, 
                    'data'=> []
                ]);
            }
            return response()->json([            
                'status' => false, 
                'message' => 'Failed delete user', 
                'code' => 500,
                'data'=> []
            ]);
        }
        return response()->json([
            'status' => false, 
            'message' => 'User not found',
            'code' => 404, 
            'data'=> []
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class AuthController extends Controller {

    /**
     * @OA\Post(
     *     path="/auth/register",
     *     description="Register new user",
	 * 	   tags={"Authentication"},
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

	/**
	 * @OA\Post(
	 *     path="/auth/login",
	 *     description="Login",
	 * 	   tags={"Authentication"},
	 *     @OA\RequestBody(
	 *         description="User credential", required=true,
	 *         @OA\MediaType(mediaType="multipart/form-data", @OA\Schema(ref="#/components/schemas/UserLogin"))
	 *     ),
	 *     @OA\Response(
	 *        response=200,
	 *        description="Credential detail",
	 *        @OA\JsonContent(
	 *         @OA\Property(property="status", type="boolean"),
	 *         @OA\Property(property="message", type="string"),
	 *         @OA\Property(property="code", type="integer"),
	 *         @OA\Property(property="data", ref="#/components/schemas/UserCredential")
	 *        )
	 *     )
	 * )
	 */
	public function login(Request $request) {
		$this->validate($request, [
			'username' => 'required|string|regex:/^[A-Za-z0-9]+$/',
			'password' => 'required|string|',
		]);

		$user = User::where('username', $request->input('username'))->first();
		if (!$user) {
			return response()->json([
				'status' => false,
				'message' => 'Username does not exist.',
				'code' => 404,
				'data' => []
			]);
		}

		if (User::validate($request->input('password'), $user->password)) {
			return response()->json([
				'status' => true,
				'message' => 'Login success',
				'code' => 200,
				'data' => (object) [
					'user' => User::retrieve($user->id),
					'token' => $this->jwt($user)
				]
			]);
		}
		return response()->json([
			'status' => false,
			'message' => 'Username or password is wrong.',
			'code' => 404,
			'data' => []
		]);
	}
		
	public function logout() {

	}

	protected function jwt(User $user) {
		$payload = [
			'iss' => 'gurisa.com',
			'sub' => $user->id,
			'iat' => time(),
			'exp' => time() + 86400 //1 day
		];
		return (object) [
			'issued' => $payload['iat'],
			'expired' => $payload['exp'],
			'issued_at' => date("Y-m-d H:i:s", $payload['iat']),
			'expired_at' => date("Y-m-d H:i:s", $payload['exp']),
			'token' => JWT::encode($payload, env('JWT_SECRET'))
		];
	}

}
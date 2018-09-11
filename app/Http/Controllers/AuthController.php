<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class AuthController extends Controller {

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
			'token' => JWT::encode($payload, env('JWT_SECRET'))
		];
	}

}
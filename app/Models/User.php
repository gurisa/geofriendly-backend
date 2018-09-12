<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @OA\Schema(
 *   schema="User",
 *   @OA\Property(
 *     property="id", type="integer"
 *   ),
 *   @OA\Property(
 *     property="username", type="string", minimum=4, maximum=20
 *   ),
 *   @OA\Property(
 *     property="password", type="string", minimum=6, maximum=20, format="password"
 *   ),
 *   @OA\Property(
 *     property="name", type="string", minimum=6, maximum=50
 *   ),
 *   @OA\Property(
 *     property="created_at", type="string", format="date-time"
 *   ),
 *   @OA\Property(
 *     property="updated_at", type="string", format="date-time"
 *   )
 * )
 */

 /**
 * @OA\Schema(
 *   schema="UserNew",
 *   @OA\Property(
 *     property="username", type="string", minimum=4, maximum=20
 *   ),
 *   @OA\Property(
 *     property="password", type="string", minimum=6, maximum=20, format="password"
 *   ),
 *   @OA\Property(
 *     property="name", type="string", minimum=6, maximum=50
 *   ),
 * )
 */

 /**
 * @OA\Schema(
 *   schema="UserUpdate",
 *   @OA\Property(
 *     property="password", type="string", minimum=6, maximum=20, format="password"
 *   ),
 *   @OA\Property(
 *     property="name", type="string", minimum=6, maximum=50
 *   ),
 * )
 */

 /**
 * @OA\Schema(
 *   schema="UserLogin",
 *   @OA\Property(
 *     property="username", type="string", minimum=4, maximum=20
 *   ),
 *   @OA\Property(
 *     property="password", type="string", minimum=6, maximum=20, format="password"
 *   )
 * )
 */

 /**
 * @OA\Schema(
 *   schema="UserCredential",
 *   @OA\Property(
 *     property="issued", type="integer"
 *   ),
 *   @OA\Property(
 *     property="expired", type="integer"
 *   ),
 *   @OA\Property(
 *     property="token", type="string"
 *   )
 * )
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract {
    use Authenticatable, Authorizable;

    protected $table = "user";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = TRUE;
    public $remember = TRUE;

    protected $fillable = ['username', 'password', 'name'];
    protected $guarded = [];
    protected $hidden = ['password'];

    public static function store($data) {
        return User::create([          
            'username' => strtolower($data['username']),
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'name' => ucwords(strtolower($data['name']))
        ]);
    }

    public static function change($id, $data) {
        if ($user = User::find($id)) {
            if ($user->update(['name' => $data['name'], 'password'=> $data['password']])) {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return User::find($id)->delete();
    }

    public static function validate($input, $current) {
        return password_verify($input, $current);
    }
}

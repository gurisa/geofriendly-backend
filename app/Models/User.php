<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

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
            'password' => app('hash')->make($data['password']),
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
}

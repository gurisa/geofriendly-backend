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
}

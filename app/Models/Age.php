<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model {

    protected $table = "age";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Age::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]);
    }

    public static function change($id, $data) {
        if ($age = Age::find($id)) {
            if ($age->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $age;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Age::find($id)->delete();
    }
}

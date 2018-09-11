<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    protected $table = "type";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Type::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]);
    }

    public static function change($id, $data) {
        if ($type = Type::find($id)) {
            if ($type->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $type;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Type::find($id)->delete();
    }
}

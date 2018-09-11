<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model {

    protected $table = "rack";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Rack::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]);
    }

    public static function change($id, $data) {
        if ($rack = Rack::find($id)) {
            if ($rack->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $rack;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Rack::find($id)->delete();
    }
}

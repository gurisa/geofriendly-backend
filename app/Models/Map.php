<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {

    protected $table = "map";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['code', 'name', 'island_id', 'scale_id', 'type_id'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Map::create([
            'code' => $data['code'],
            'name' => ucwords(strtolower($data['name'])),
            'island_id' => $data['island_id'],
            'scale_id' => $data['scale_id'],
            'type_id' => $data['type_id'],
        ]);
    }

    public static function change($id, $data) {
        if ($map = Map::find($id)) {
            if ($map->update([
                'code'=> $data['code'], 
                'name' => $data['name'], 
                'island_id'=> $data['island_id'], 
                'scale_id'=> $data['scale_id'], 
                'type_id'=> $data['type_id']
            ])) {
                return $map;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Map::find($id)->delete();
    }
}

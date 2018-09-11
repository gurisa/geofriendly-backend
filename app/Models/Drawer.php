<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drawer extends Model {

    protected $table = "drawer";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description', 'rack_id'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Drawer::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
            'rack_id' => $data['rack_id'],
        ]);
    }

    public static function change($id, $data) {
        if ($drawer = Drawer::find($id)) {
            if ($drawer->update(['name' => $data['name'], 'description'=> $data['description'], 'rack_id'=> $data['rack_id']])) {
                return $drawer;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Drawer::find($id)->delete();
    }
}

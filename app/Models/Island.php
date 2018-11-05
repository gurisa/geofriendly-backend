<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model {

    protected $table = "island";
    protected $primaryKey = "id";

    public $incrementing = FALSE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['id', 'name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Island::create([
            'id' => $data['id'],
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]);
    }

    public static function change($id, $data) {
        if ($island = Island::find($id)) {
            if ($island->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $island;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Island::find($id)->delete();
    }
}

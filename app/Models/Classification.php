<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model {

    protected $table = "classification";
    protected $primaryKey = "id";

    public $incrementing = FALSE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['id', 'name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Classification::create([
            'id' => $data['description'],
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]);
    }

    public static function change($id, $data) {
        if ($class = Classification::find($id)) {
            if ($class->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $class;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Classification::find($id)->delete();
    }
}

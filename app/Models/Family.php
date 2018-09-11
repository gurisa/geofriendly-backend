<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

    protected $table = "family";
    protected $primaryKey = "id";

    public $incrementing = FALSE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['id', 'name', 'description', 'class_id'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Family::create([
            'id' => $data['id'],
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
            'class_id' => $data['class_id'],
        ]);
    }

    public static function change($id, $data) {
        if ($class = Family::find($id)) {
            if ($class->update(['name' => $data['name'], 'description'=> $data['description'], 'class_id'=> $data['class_id']])) {
                return $class;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Family::find($id)->delete();
    }
}

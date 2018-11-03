<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

    protected $table = "family";
    protected $primaryKey = "id";

    public $incrementing = FALSE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['id', 'name', 'description', 'classification_id'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Family::create([
            'id' => $data['id'],
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
            'classification_id' => $data['classification_id'],
        ]);
    }

    public static function change($id, $data) {
        if ($family = Family::find($id)) {
            if ($family->update([
                'name' => $data['name'], 
                'description'=> $data['description'], 
                'classification_id'=> $data['classification_id'],
            ])) {
                return $family;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Family::find($id)->delete();
    }
}

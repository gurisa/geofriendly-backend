<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model {

    protected $table = "acquisition";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Acquisition::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
        ]); 
    }

    public static function change($id, $data) {
        if ($acquisition = Acquisition::find($id)) {
            if ($acquisition->update(['name' => $data['name'], 'description'=> $data['description']])) {
                return $acquisition;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Acquisition::find($id)->delete();
    }
}

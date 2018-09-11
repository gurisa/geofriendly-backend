<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model {

    protected $table = "scale";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = FALSE;
    public $remember = FALSE;

    protected $fillable = ['name', 'description', 'amount'];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Scale::create([
            'name' => ucwords(strtolower($data['name'])),
            'description' => $data['description'],
            'amount' => $data['amount'],
        ]);
    }

    public static function change($id, $data) {
        if ($scale = Scale::find($id)) {
            if ($scale->update(['name' => $data['name'], 'description'=> $data['description'], 'amount'=> $data['amount']])) {
                return $scale;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Scale::find($id)->delete();
    }
}

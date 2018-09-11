<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {

    protected $table = "collection";
    protected $primaryKey = "id";

    public $incrementing = TRUE;
    public $timestamps = TRUE;
    public $remember = FALSE;

    protected $fillable = [
        'registration', 'inventory', 'code', 'name', 
        'synonym', 'amount', 'founder', 'collector', 
        'location', 'coordinate', 'formation', 'determination', 
        'redetermination', 'type', 'width', 'height',
        'weight', 'high', 'environment', 'reference',
        'description', 'photo', 'family_id', 'age_id',
        'drawer_id', 'map_id', 'acquisition_id', 'user_id',
        'taken_at'
    ];
    protected $guarded = [];
    protected $hidden = [];

    public static function store($data) {
        return Collection::create([
            'registration' => $data['registration'],
            'inventory' => $data['inventory'],
            'code' => $data['code'],
            'name' => ucwords(strtolower($data['name'])),
            'synonym' => $data['synonym'],
            'amount' => $data['amount'],
            'founder' => $data['founder'],
            'collector' => $data['collector'],
            'location' => $data['location'],
            'coordinate' => $data['coordinate'],
            'formation' => $data['formation'],
            'determination' => $data['determination'],
            'redetermination' => $data['redetermination'],
            'type' => $data['type'],
            'width' => $data['width'], 'height' => $data['height'],
            'weight' => $data['weight'], 'high' => $data['high'],
            'environment' => $data['environment'],
            'reference' => $data['reference'],
            'description' => $data['description'],
            'photo' => $data['photo'],
            'family_id' => $data['family_id'], 'age_id' => $data['age_id'],
            'drawer_id' => $data['drawer_id'], 'map_id' => $data['map_id'],
            'acquisition_id' => $data['acquisition_id'], 'user_id' => $data['user_id'],
            'taken_at' => $data['taken_at']
        ]);
    }

    public static function change($id, $data) {
        if ($collection = Collection::find($id)) {
            if ($collection->update([
                'registration' => $data['registration'],
                'inventory' => $data['inventory'],
                'code' => $data['code'],
                'name' => ucwords(strtolower($data['name'])),
                'synonym' => $data['synonym'],
                'amount' => $data['amount'],
                'founder' => $data['founder'],
                'collector' => $data['collector'],
                'location' => $data['location'],
                'coordinate' => $data['coordinate'],
                'formation' => $data['formation'],
                'determination' => $data['determination'],
                'redetermination' => $data['redetermination'],
                'type' => $data['type'],
                'width' => $data['width'], 'height' => $data['height'],
                'weight' => $data['weight'], 'high' => $data['high'],
                'environment' => $data['environment'],
                'reference' => $data['reference'],
                'description' => $data['description'],
                'photo' => $data['photo'],
                'family_id' => $data['family_id'], 'age_id' => $data['age_id'],
                'drawer_id' => $data['drawer_id'], 'map_id' => $data['map_id'],
                'acquisition_id' => $data['acquisition_id'], 'user_id' => $data['user_id'],
                'taken_at' => $data['taken_at']
            ])) {
                return $collection;
            }
            return false;
        }
        return false;
    }

    public static function erase($id) {
        return Collection::find($id)->delete();
    }
}

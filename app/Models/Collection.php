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
            'synonym' => isset($data['synonym']) ? $data['synonym'] : NULL,
            'amount' => isset($data['amount']) ? $data['amount'] : NULL,
            'founder' => isset($data['founder']) ? $data['founder'] : NULL,
            'collector' => isset($data['collector']) ? $data['collector'] : NULL,
            'location' => isset($data['location']) ? $data['location'] : NULL,
            'coordinate' => isset($data['coordinate']) ? $data['coordinate'] : NULL,
            'formation' => isset($data['formation']) ? $data['formation'] : NULL,
            'determination' => isset($data['determination']) ? $data['determination'] : NULL,
            'redetermination' => isset($data['redetermination']) ? $data['redetermination'] : NULL,
            'type' => isset($data['type']) ? $data['type'] : NULL,
            'width' => isset($data['width']) ? $data['width'] : NULL,
            'height' => isset($data['height']) ? $data['height'] : NULL,
            'weight' => isset($data['weight']) ? $data['weight'] : NULL,
            'high' => isset($data['high']) ? $data['high'] : NULL,
            'environment' => isset($data['environment']) ? $data['environment'] : NULL,
            'reference' => isset($data['reference']) ? $data['reference'] : NULL,
            'description' => isset($data['description']) ? $data['description'] : NULL,
            'photo' => isset($data['photo']) ? $data['photo'] : NULL,
            'family_id' => $data['family_id'], 
            'age_id' => $data['age_id'],
            'drawer_id' => $data['drawer_id'], 
            'map_id' => $data['map_id'],
            'acquisition_id' => $data['acquisition_id'], 
            'user_id' => isset($data['user_id']) ? $data['user_id'] : NULL,
            'taken_at' => isset($data['taken_at']) && !empty($data['taken_at']) && $data['taken_at'] !== '0000-00-00' ? $data['taken_at'] : NULL,
        ]);
    }

    public static function change($id, $data) {
        if ($collection = Collection::find($id)) {
            if ($collection->update([
                'registration' => $data['registration'],
                'inventory' => $data['inventory'],
                'code' => $data['code'],
                'name' => ucwords(strtolower($data['name'])),
                'synonym' => isset($data['synonym']) ? $data['synonym'] : NULL,
                'amount' => isset($data['amount']) ? $data['amount'] : NULL,
                'founder' => isset($data['founder']) ? $data['founder'] : NULL,
                'collector' => isset($data['collector']) ? $data['collector'] : NULL,
                'location' => isset($data['location']) ? $data['location'] : NULL,
                'coordinate' => isset($data['coordinate']) ? $data['coordinate'] : NULL,
                'formation' => isset($data['formation']) ? $data['formation'] : NULL,
                'determination' => isset($data['determination']) ? $data['determination'] : NULL,
                'redetermination' => isset($data['redetermination']) ? $data['redetermination'] : NULL,
                'type' => isset($data['type']) ? $data['type'] : NULL,
                'width' => isset($data['width']) ? $data['width'] : NULL,
                'height' => isset($data['height']) ? $data['height'] : NULL,
                'weight' => isset($data['weight']) ? $data['weight'] : NULL,
                'high' => isset($data['high']) ? $data['high'] : NULL,
                'environment' => isset($data['environment']) ? $data['environment'] : NULL,
                'reference' => isset($data['reference']) ? $data['reference'] : NULL,
                'description' => isset($data['description']) ? $data['description'] : NULL,
                'photo' => isset($data['photo']) ? $data['photo'] : NULL,
                'family_id' => $data['family_id'], 
                'age_id' => $data['age_id'],
                'drawer_id' => $data['drawer_id'], 
                'map_id' => $data['map_id'],
                'acquisition_id' => $data['acquisition_id'], 
                'user_id' => isset($data['user_id']) ? $data['user_id'] : NULL,
                'taken_at' => isset($data['taken_at']) && !empty($data['taken_at']) && $data['taken_at'] !== '0000-00-00' ? $data['taken_at'] : NULL,
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

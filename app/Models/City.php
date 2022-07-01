<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public $table = 'city';

    protected $fillable = [
        'name',
        'city_group_id'
    ];

    public function cityGroups()
    {
        return $this->belongsTo(CityGroup::class);
    }
}

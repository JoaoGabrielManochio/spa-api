<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityGroup extends Model
{
    use SoftDeletes;

    public $table = 'city_group';

    protected $fillable = [
        'name',
        'campaign_id'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }
}

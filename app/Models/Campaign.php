<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    public $table = 'campaign';

    protected $fillable = [
        'name',
        'active'
    ];

    public function cityGroups()
    {
        return $this->hasMany(CityGroup::class);
    }
}

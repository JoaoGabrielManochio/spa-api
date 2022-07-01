<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'campaign_id'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}

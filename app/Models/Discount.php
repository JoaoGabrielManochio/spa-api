<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    public $table = 'product_discount';

    protected $fillable = [
        'discount',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
